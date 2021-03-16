<?php

namespace app\models;

use app\models\mgcms\db\File;
use app\models\mgcms\db\FileRelation;
use Yii;
use yii\base\Model;
use \app\components\mgcms\MgHelpers;
use yii\web\UploadedFile;

/**
 * ContactForm is the model behind the contact form.
 */
class ReportRealEstateForm extends Model
{

    public $name;
    public $surname;
    public $email;
    public $companyName;
    public $phone;
    public $body;
    public $reCaptcha;
    public $acceptTerms;

    public $uploadedFiles;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'surname', 'email', 'body', 'companyName'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            ['phone', 'safe'],
            [['uploadedFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, doc, docx', 'maxFiles' => 4],
            // verifyCode needs to be entered correctly
//            [['reCaptcha'], \app\components\mgcms\recaptcha\ReCaptchaValidator::className()],
            //[['acceptTerms'], 'required', 'requiredValue' => 1, 'message' => Yii::t('db', 'This field is required')],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('db', 'Name'),
            'surname' => Yii::t('db', 'Surname'),
            'email' => Yii::t('db', 'Email address'),
            'companyName' => Yii::t('db', 'Company name'),
            'phone' => Yii::t('db', 'Phone'),
            'body' => Yii::t('db', 'Real estate description'),
            'acceptTerms' => Yii::t('db', MgHelpers::getSettingTranslated('report_real_estate_accept_terms_text', 'I accept terms and conditions')),
            'verifyCode' => 'Verification Code',
        ];
    }


    public function sendMail()
    {

        if ($this->validate()) {

            $files = $this->uploadFiles();
            Yii::$app->mailer->compose('realEstateReport', ['model' => $this, 'files' => $files])
                ->setTo(MgHelpers::getSetting('real_estate_form_email'))
                ->setFrom([$this->email => $this->name . ' ' . $this->surname])
                ->setSubject(Yii::t('db', 'Real estate report'))
                ->send();
            MgHelpers::getSettingTranslated('contact_mail_notification', 'Thank you for contacting us');
            return true;
        }
        MgHelpers::setFlashError(Yii::t('app', 'Error during sending contact message, please correct form'));
        return false;
    }

    private function uploadFiles()
    {

        $upladedFiles = UploadedFile::getInstances($this, 'uploadedFiles');

        $files = [];
        if ($upladedFiles) {
            foreach ($upladedFiles as $CUploadedFileModel) {
                if ($CUploadedFileModel->hasError) {
                    MgHelpers::setFlash(MgHelpers::FLASH_TYPE_ERROR, Yii::t('app', 'Error with uploading file - probably file is too big'));
                    continue;
                }
                $fileModel = new File;
                $file = $fileModel->push(new \rmrevin\yii\module\File\resources\UploadedResource($CUploadedFileModel));
                if ($file) {
                    $files[] = $file;
                } else {
                    MgHelpers::setFlashError('Błąd dodawania pliku powiązanego');
                }
            }
            return $files;
        }
        return false;
    }

}
