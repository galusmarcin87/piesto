<?php

namespace app\models\mgcms\db\base;

use app\components\mgcms\MgHelpers;
use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string $role
 * @property integer $status
 * @property string $email
 * @property string $created_on
 * @property string $last_login
 * @property integer $created_by
 * @property string $address
 * @property string $postcode
 * @property string $birthdate
 * @property string $city
 * @property string $auth_key
 * @property string $file_id
 * @property string $country
 * @property string $voivodeship
 * @property string $street
 * @property string $flat_no
 * @property string $citizenship
 * @property string $id_document_type
 * @property string $id_document_no
 * @property string $pesel
 *
 * @property \app\models\mgcms\db\User $createdBy
 * @property \app\models\mgcms\db\User[] $users
 * @property \app\models\mgcms\db\File $file
 */
class User extends \app\models\mgcms\db\AbstractRecord
{

    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
   * @inheritdoc
   */
  public function attributeLabels()
  {
    return [
        'id' => Yii::t('app', 'ID'),
        'username' => Yii::t('db', 'E-mail address'),
        'password' => Yii::t('db', 'Password'),
        'first_name' => Yii::t('db', 'First Name'),
        'last_name' => Yii::t('db', 'Last Name'),
        'role' => Yii::t('app', 'Role'),
        'status' => Yii::t('app', 'Status'),
        'statusStr' => Yii::t('app', 'Status'),
        'email' => Yii::t('db', 'Email'),
        'created_on' => Yii::t('app', 'Created On'),
        'last_login' => Yii::t('app', 'Last Login'),
        'created_by' => Yii::t('app', 'Created By'),
        'createdBy' => Yii::t('app', 'Created By'),
        'address' => Yii::t('app', 'Address'),
        'postcode' => Yii::t('db', 'Postcode'),
        'birthdate' => Yii::t('db', 'Birthdate'),
        'city' => Yii::t('db', 'City'),
        'is_company' => Yii::t('db', 'Is company?'),
        'citizenship' => Yii::t('db', 'Citizenship'),
        'pesel' => Yii::t('db', 'Pesel'),
        'birth_country' => Yii::t('db', 'Birth country'),
        'document_type' => Yii::t('db', 'Type of identity document'),
        'street' => Yii::t('db', 'Street'),
        'house_no' => Yii::t('db', 'House number'),
        'flat_no' => Yii::t('db', 'Flat number'),
        'phone' => Yii::t('db', 'Phone'),
        'company_name' => Yii::t('db', 'Company name'),
        'company_id' => Yii::t('db', 'Company identifier'),
        'passwordRepeat' => Yii::t('db', 'Repeat password'),
        'id_document_type' => Yii::t('db', 'Identity document kind'),
        'id_document_no' => Yii::t('db', 'Identity document number'),
        'voivodeship' => Yii::t('db', 'Voivodeship'),
        'acceptTerms' => MgHelpers::getSettingTranslated('account_terms_label', 'Zgoda na ....'),
        'country' => Yii::t('db', 'Country'),
        'oldPassword' => Yii::t('db', 'Old password'),
    ];
  }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(\app\models\mgcms\db\User::className(), ['id' => 'created_by']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(\app\models\mgcms\db\User::className(), ['created_by' => 'id']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\mgcms\db\UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\mgcms\db\UserQuery(get_called_class());
    }
}
