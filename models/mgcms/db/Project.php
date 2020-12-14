<?php

namespace app\models\mgcms\db;

use Yii;
use app\components\mgcms\MgHelpers;

/**
 * This is the base model class for table "project".
 *
 * @property integer $id
 * @property string $name
 * @property string $status
 * @property string $localization
 * @property string $gps_lat
 * @property string $gps_long
 * @property string $lead
 * @property string $text
 * @property string $text2
 * @property integer $file_id
 * @property integer $flag_id
 * @property string $whitepaper
 * @property string $www
 * @property double $money
 * @property double $money_full
 * @property string $investition_time
 * @property integer $percentage
 * @property string $date_presale_start
 * @property string $date_presale_end
 * @property string $date_crowdsale_start
 * @property string $date_crowdsale_end
 * @property integer $percentage_presale_bonus
 * @property string $date_realization_profit
 * @property integer $token_value
 * @property string $token_blockchain
 * @property integer $token_to_sale
 * @property integer $token_minimal_buy
 * @property integer $token_left
 *  @property string $buy_token_info
 * @property string $token_currency
 *
 * @property \app\models\mgcms\db\Bonus[] $bonuses
 * @property \app\models\mgcms\db\Payment[] $payments
 * @property \app\models\mgcms\db\File $file
 * @property \app\models\mgcms\db\File $flag
 */
class Project extends \app\models\mgcms\db\AbstractRecord
{
    use LanguageBehaviorTrait;

    public $languageAttributes = ['name', 'lead', 'text','text2', 'buy_token_info'];

    const STATUS_ACTIVE = 1;
    const STATUS_ENDED = 2;
    const STATUS_PLANNED = 3;
    const STATUSES = [self::STATUS_ACTIVE => 'aktywny', self::STATUS_ENDED => 'zakończony', self::STATUS_PLANNED => 'zaplanowany'];
    const STATUSES_EN = [self::STATUS_ACTIVE => 'Current', self::STATUS_ENDED => 'Ended', self::STATUS_PLANNED => 'Planned'];

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'file_id'], 'required'],
            [['gps_lat', 'gps_long', 'money', 'money_full'], 'number'],
            [['lead', 'text','text2', 'buy_token_info'], 'string'],
            [['file_id', 'percentage', 'percentage_presale_bonus', 'token_value', 'token_to_sale', 'token_minimal_buy', 'token_left', 'flag_id'], 'integer'],
            [['date_presale_start', 'date_presale_end', 'date_crowdsale_start', 'date_crowdsale_end', 'date_realization_profit'], 'safe'],
            [['name', 'localization', 'whitepaper', 'www', 'token_blockchain'], 'string', 'max' => 245],
            [['status', 'investition_time','token_currency'], 'string', 'max' => 45]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'status' => Yii::t('app', 'Status'),
            'localization' => Yii::t('app', 'Localization'),
            'gps_lat' => Yii::t('app', 'Gps Lat'),
            'gps_long' => Yii::t('app', 'Gps Long'),
            'lead' => Yii::t('app', 'Lead'),
            'text' => Yii::t('app', 'Text'),
            'text2' => Yii::t('app', 'Text2'),
            'file_id' => Yii::t('app', 'File'),
            'flag_id' => Yii::t('app', 'Flaga'),
            'whitepaper' => Yii::t('app', 'Whitepaper'),
            'www' => Yii::t('app', 'Www'),
            'money' => Yii::t('app', 'Money'),
            'money_full' => Yii::t('app', 'Money Full'),
            'investition_time' => Yii::t('app', 'Investition Time'),
            'percentage' => Yii::t('app', 'Percentage'),
            'date_presale_start' => Yii::t('app', 'Date Presale Start'),
            'date_presale_end' => Yii::t('app', 'Date Presale End'),
            'date_crowdsale_start' => Yii::t('app', 'Date Crowdsale Start'),
            'date_crowdsale_end' => Yii::t('app', 'Date Crowdsale End'),
            'percentage_presale_bonus' => Yii::t('app', 'Percentage Presale Bonus'),
            'date_realization_profit' => Yii::t('app', 'Date Realization Profit'),
            'token_value' => Yii::t('app', 'Token Value'),
            'token_blockchain' => Yii::t('app', 'Token Blockchain'),
            'token_to_sale' => Yii::t('app', 'Token To Sale'),
            'token_minimal_buy' => Yii::t('app', 'Token Minimal Buy'),
            'token_left' => Yii::t('app', 'Token Left'),
            'uploadedFiles' => "Obrazki",
            'buy_token_info' => Yii::t('app', 'Buy Token Info'),
            'token_currency' => Yii::t('app', 'Token currency'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBonuses()
    {
        return $this->hasMany(\app\models\mgcms\db\Bonus::className(), ['project_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(\app\models\mgcms\db\Payment::className(), ['project_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFile()
    {
        return $this->hasOne(\app\models\mgcms\db\File::className(), ['id' => 'file_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlag()
    {
        return $this->hasOne(\app\models\mgcms\db\File::className(), ['id' => 'flag_id']);
    }
    
    /**
     * @inheritdoc
     * @return \app\models\mgcms\db\ProjectQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\mgcms\db\ProjectQuery(get_called_class());
    }
     public function getLinkUrl()
  {
    return \yii\helpers\Url::to(['/project/view', 'name' => $this->name]);
  }
}
