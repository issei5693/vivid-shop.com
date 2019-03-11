<?php
/**
 * Payment
 *
 * PHP version 5
 *
 * @category Class
 * @package  ColorMeShop\Swagger
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * カラーミーショップ API
 *
 * # カラーミーショップ API  [カラーミーショップ](https://shop-pro.jp) APIでは、受注の検索や商品情報の更新を行うことができます。  ## 利用手順  はじめに、カラーミーデベロッパーアカウントを用意します。[デベロッパー登録ページ](https://api.shop-pro.jp/developers/sign_up)から登録してください。  次に、[登録ページ](https://api.shop-pro.jp/oauth/applications/new)からアプリケーション登録を行ってください。 スマートフォンのWebViewを利用する場合は、リダイレクトURIに`urn:ietf:wg:oauth:2.0:oob`を入力してください。  その後、カラーミーショップアカウントの認証ページを開きます。認証ページのURLは、`https://api.shop-pro.jp/oauth/authorize`に必要なパラメータをつけたものです。  |パラメータ名|値| |---|---| |`client_id`|アプリケーション詳細画面で確認できるクライアントID| |`response_type`|\"code\"という文字列| |`scope`| 別表参照| |`redirect_uri`|アプリケーション登録時に入力したリダイレクトURI|  `scope`は、以下のうち、アプリケーションが利用したい機能をスペース区切りで指定してください。  |スコープ|機能| |---|---| |`read_products`|商品データの参照| |`write_products`|在庫データの更新| |`read_sales`|受注・顧客データの参照| |`write_sales`|受注データの更新|  以下のようなURLとなります。  ``` https://api.shop-pro.jp/oauth/authorize?client_id=CLIENT_ID&redirect_uri=REDIRECT_URI&response_type=code&scope=read_products%20write_products ```  初めてこのページを訪れる場合は、カラーミーショップアカウントのIDとパスワードの入力を求められます。 承認ボタンを押すと、このアプリケーションがショップのデータにアクセスすることが許可され、リダイレクトURIへリダイレクトされます。  承認された場合は、`code`というクエリパラメータに認可コードが付与されます。承認がキャンセルされた、またはエラーが起きた場合は、 `error`パラメータにエラーの内容を表す文字列が与えられます。  アプリケーション登録時のリダイレクトURIに`urn:ietf:wg:oauth:2.0:oob`を指定した場合は、以下のようなURLにリダイレクトされます。 末尾のパスが認可コードになっています。  ``` https://api.shop-pro.jp/oauth/authorize/AUTH_CODE ```  認可コードの有効期限は発行から10分間です。  最後に、認可コードとアクセストークンを交換します。以下のパラメータを付けて、`https://api.shop-pro.jp/oauth/token`へリクエストを送ります。  |パラメータ名|値| |---|---| |`client_id`|アプリケーション詳細画面に表示されているクライアントID| |`client_secret`|アプリケーション詳細画面に表示されているクライアントシークレット| |`code`|取得した認可コード| |`grant_type`|\"authorization_code\"という文字列| |`redirect_uri`|アプリケーション登録時に入力したリダイレクトURI|  ```console # curl での例  $ curl -X POST \\   -d'client_id=CLIENT_ID' \\   -d'client_secret=CLIENT_SECRET' \\   -d'code=CODE' \\   -d'grant_type=authorization_code'   \\   -d'redirect_uri=REDIRECT_URI'  \\   'https://api.shop-pro.jp/oauth/token' ```  リクエストが成功すると、以下のようなJSONが返ってきます。  ```json {   \"access_token\": \"d461ab8XXXXXXXXXXXXXXXXXXXXXXXXX\",   \"token_type\": \"bearer\",   \"scope\": \"read_products write_products\" } ```  アクセストークンに有効期限はありませんが、許可済みアプリケーション一覧画面から失効させることができます。なお、同じ認可コードをアクセストークンに交換できるのは1度だけです。  取得したアクセストークンは、Authorizationヘッダに入れて使用します。以下にショップ情報を取得する際の例を示します。  ```console # curlの例  $ curl -H 'Authorization: Bearer d461ab8XXXXXXXXXXXXXXXXXXXXXXXXX' https://api.shop-pro.jp/v1/shop.json ```  ## エラー  カラーミーショップAPI v1では  - エラーコード - エラーメッセージ - ステータスコード  の配列でエラーを表現します。以下に例を示します。  ```json {   \"errors\": [     {       \"code\": 404100,       \"message\": \"レコードが見つかりませんでした。\",       \"status\": 404     }   ] } ```
 *
 * OpenAPI spec version: 1.0.0
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 2.3.0
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace ColorMeShop\Swagger\Model;

use \ArrayAccess;
use \ColorMeShop\Swagger\ObjectSerializer;

/**
 * Payment Class Doc Comment
 *
 * @category Class
 * @package  ColorMeShop\Swagger
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Payment implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Payment';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'id' => 'int',
        'account_id' => 'string',
        'name' => 'string',
        'fee' => 'int',
        'ip_code' => 'string',
        'memo' => 'string',
        'memo_mobile' => 'string',
        'sort' => 'int',
        'image_url' => 'string',
        'type' => 'int',
        'display' => 'bool',
        'use_mobile' => 'bool',
        'make_date' => 'int',
        'update_date' => 'int',
        'cod' => '\ColorMeShop\Swagger\Model\PaymentCod',
        'card' => '\ColorMeShop\Swagger\Model\PaymentCard',
        'financial' => '\ColorMeShop\Swagger\Model\PaymentFinancial'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'id' => null,
        'account_id' => null,
        'name' => null,
        'fee' => null,
        'ip_code' => null,
        'memo' => null,
        'memo_mobile' => null,
        'sort' => null,
        'image_url' => null,
        'type' => null,
        'display' => null,
        'use_mobile' => null,
        'make_date' => null,
        'update_date' => null,
        'cod' => null,
        'card' => null,
        'financial' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'id' => 'id',
        'account_id' => 'account_id',
        'name' => 'name',
        'fee' => 'fee',
        'ip_code' => 'ip_code',
        'memo' => 'memo',
        'memo_mobile' => 'memo_mobile',
        'sort' => 'sort',
        'image_url' => 'image_url',
        'type' => 'type',
        'display' => 'display',
        'use_mobile' => 'use_mobile',
        'make_date' => 'make_date',
        'update_date' => 'update_date',
        'cod' => 'cod',
        'card' => 'card',
        'financial' => 'financial'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'account_id' => 'setAccountId',
        'name' => 'setName',
        'fee' => 'setFee',
        'ip_code' => 'setIpCode',
        'memo' => 'setMemo',
        'memo_mobile' => 'setMemoMobile',
        'sort' => 'setSort',
        'image_url' => 'setImageUrl',
        'type' => 'setType',
        'display' => 'setDisplay',
        'use_mobile' => 'setUseMobile',
        'make_date' => 'setMakeDate',
        'update_date' => 'setUpdateDate',
        'cod' => 'setCod',
        'card' => 'setCard',
        'financial' => 'setFinancial'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'account_id' => 'getAccountId',
        'name' => 'getName',
        'fee' => 'getFee',
        'ip_code' => 'getIpCode',
        'memo' => 'getMemo',
        'memo_mobile' => 'getMemoMobile',
        'sort' => 'getSort',
        'image_url' => 'getImageUrl',
        'type' => 'getType',
        'display' => 'getDisplay',
        'use_mobile' => 'getUseMobile',
        'make_date' => 'getMakeDate',
        'update_date' => 'getUpdateDate',
        'cod' => 'getCod',
        'card' => 'getCard',
        'financial' => 'getFinancial'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['account_id'] = isset($data['account_id']) ? $data['account_id'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['fee'] = isset($data['fee']) ? $data['fee'] : null;
        $this->container['ip_code'] = isset($data['ip_code']) ? $data['ip_code'] : null;
        $this->container['memo'] = isset($data['memo']) ? $data['memo'] : null;
        $this->container['memo_mobile'] = isset($data['memo_mobile']) ? $data['memo_mobile'] : null;
        $this->container['sort'] = isset($data['sort']) ? $data['sort'] : null;
        $this->container['image_url'] = isset($data['image_url']) ? $data['image_url'] : null;
        $this->container['type'] = isset($data['type']) ? $data['type'] : null;
        $this->container['display'] = isset($data['display']) ? $data['display'] : null;
        $this->container['use_mobile'] = isset($data['use_mobile']) ? $data['use_mobile'] : null;
        $this->container['make_date'] = isset($data['make_date']) ? $data['make_date'] : null;
        $this->container['update_date'] = isset($data['update_date']) ? $data['update_date'] : null;
        $this->container['cod'] = isset($data['cod']) ? $data['cod'] : null;
        $this->container['card'] = isset($data['card']) ? $data['card'] : null;
        $this->container['financial'] = isset($data['financial']) ? $data['financial'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['type']) && ($this->container['type'] < 0)) {
            $invalidProperties[] = "invalid value for 'type', must be bigger than or equal to 0.";
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {

        if ($this->container['type'] < 0) {
            return false;
        }
        return true;
    }


    /**
     * Gets id
     *
     * @return int
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param int $id 決済方法ID
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets account_id
     *
     * @return string
     */
    public function getAccountId()
    {
        return $this->container['account_id'];
    }

    /**
     * Sets account_id
     *
     * @param string $account_id ショップアカウントID
     *
     * @return $this
     */
    public function setAccountId($account_id)
    {
        $this->container['account_id'] = $account_id;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name 決済名
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets fee
     *
     * @return int
     */
    public function getFee()
    {
        return $this->container['fee'];
    }

    /**
     * Sets fee
     *
     * @param int $fee 決済手数料
     *
     * @return $this
     */
    public function setFee($fee)
    {
        $this->container['fee'] = $fee;

        return $this;
    }

    /**
     * Gets ip_code
     *
     * @return string
     */
    public function getIpCode()
    {
        return $this->container['ip_code'];
    }

    /**
     * Sets ip_code
     *
     * @param string $ip_code GMOイプシロン等との契約コード
     *
     * @return $this
     */
    public function setIpCode($ip_code)
    {
        $this->container['ip_code'] = $ip_code;

        return $this;
    }

    /**
     * Gets memo
     *
     * @return string
     */
    public function getMemo()
    {
        return $this->container['memo'];
    }

    /**
     * Sets memo
     *
     * @param string $memo 説明
     *
     * @return $this
     */
    public function setMemo($memo)
    {
        $this->container['memo'] = $memo;

        return $this;
    }

    /**
     * Gets memo_mobile
     *
     * @return string
     */
    public function getMemoMobile()
    {
        return $this->container['memo_mobile'];
    }

    /**
     * Sets memo_mobile
     *
     * @param string $memo_mobile フィーチャーフォン向けショップ用の説明
     *
     * @return $this
     */
    public function setMemoMobile($memo_mobile)
    {
        $this->container['memo_mobile'] = $memo_mobile;

        return $this;
    }

    /**
     * Gets sort
     *
     * @return int
     */
    public function getSort()
    {
        return $this->container['sort'];
    }

    /**
     * Sets sort
     *
     * @param int $sort 表示順
     *
     * @return $this
     */
    public function setSort($sort)
    {
        $this->container['sort'] = $sort;

        return $this;
    }

    /**
     * Gets image_url
     *
     * @return string
     */
    public function getImageUrl()
    {
        return $this->container['image_url'];
    }

    /**
     * Sets image_url
     *
     * @param string $image_url 決済画像URL
     *
     * @return $this
     */
    public function setImageUrl($image_url)
    {
        $this->container['image_url'] = $image_url;

        return $this;
    }

    /**
     * Gets type
     *
     * @return int
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param int $type 決済タイプを表す数値。  |type|決済| |---|---| |0|代引き| |1|銀行振込| |2|郵便振替| |3|クレジット（ZEUS）| |4|クロネコ@ペイメント| |5|NP後払い| |6|クレジット（イプシロン）| |7|コンビニ決済（イプシロン）| |8|カラーミークレジット| |9|その他決済| |10|ウェブマネー| |11|イーバンクデビット| |12|ネット銀行（イプシロン）| |13|電子マネー（イプシロン）| |14|ATM・コンビニ・ネット銀行決済（ペイジェント）| |15|Do-Link決済（イプシロン）| |16|ペイジー（イプシロン）| |17|後払い.com| |18|ジャパンネット銀行（送料無料キャンペーン）| |19|クロネコwebコレクト| |20|PayPal（イプシロン）| |21|Yahoo!ウォレット（イプシロン）| |22|全額ポイント利用| |23|スマートフォンキャリア決済（イプシロン）| |24|GMO PG マルチペイメントクレジットカード| |25|住信SBIネット銀行（イプシロン）| |26|GMO後払い（イプシロン）| |27|GMO後払い（GMOペイメントサービス）| |28| - | |29|ATM（ペイジー）（ペイジェント）| |30|カード（ペイジェント）| |31|コンビニ番号方式（ペイジェント）| |32|インターネットバンキング（ペイジェント）| |33|PayPal（ペイパル）| |34|SMBC GMO PAYMENTクレジットカード| |35|Amazon Pay| |36|楽天ペイ（オンライン決済）|
     *
     * @return $this
     */
    public function setType($type)
    {

        if (!is_null($type) && ($type < 0)) {
            throw new \InvalidArgumentException('invalid value for $type when calling Payment., must be bigger than or equal to 0.');
        }

        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets display
     *
     * @return bool
     */
    public function getDisplay()
    {
        return $this->container['display'];
    }

    /**
     * Sets display
     *
     * @param bool $display 表示設定。`true`なら表示される
     *
     * @return $this
     */
    public function setDisplay($display)
    {
        $this->container['display'] = $display;

        return $this;
    }

    /**
     * Gets use_mobile
     *
     * @return bool
     */
    public function getUseMobile()
    {
        return $this->container['use_mobile'];
    }

    /**
     * Sets use_mobile
     *
     * @param bool $use_mobile フィーチャーフォン向けショップでの表示設定
     *
     * @return $this
     */
    public function setUseMobile($use_mobile)
    {
        $this->container['use_mobile'] = $use_mobile;

        return $this;
    }

    /**
     * Gets make_date
     *
     * @return int
     */
    public function getMakeDate()
    {
        return $this->container['make_date'];
    }

    /**
     * Sets make_date
     *
     * @param int $make_date 決済作成日時
     *
     * @return $this
     */
    public function setMakeDate($make_date)
    {
        $this->container['make_date'] = $make_date;

        return $this;
    }

    /**
     * Gets update_date
     *
     * @return int
     */
    public function getUpdateDate()
    {
        return $this->container['update_date'];
    }

    /**
     * Sets update_date
     *
     * @param int $update_date 決済更新日時
     *
     * @return $this
     */
    public function setUpdateDate($update_date)
    {
        $this->container['update_date'] = $update_date;

        return $this;
    }

    /**
     * Gets cod
     *
     * @return \ColorMeShop\Swagger\Model\PaymentCod
     */
    public function getCod()
    {
        return $this->container['cod'];
    }

    /**
     * Sets cod
     *
     * @param \ColorMeShop\Swagger\Model\PaymentCod $cod cod
     *
     * @return $this
     */
    public function setCod($cod)
    {
        $this->container['cod'] = $cod;

        return $this;
    }

    /**
     * Gets card
     *
     * @return \ColorMeShop\Swagger\Model\PaymentCard
     */
    public function getCard()
    {
        return $this->container['card'];
    }

    /**
     * Sets card
     *
     * @param \ColorMeShop\Swagger\Model\PaymentCard $card card
     *
     * @return $this
     */
    public function setCard($card)
    {
        $this->container['card'] = $card;

        return $this;
    }

    /**
     * Gets financial
     *
     * @return \ColorMeShop\Swagger\Model\PaymentFinancial
     */
    public function getFinancial()
    {
        return $this->container['financial'];
    }

    /**
     * Sets financial
     *
     * @param \ColorMeShop\Swagger\Model\PaymentFinancial $financial financial
     *
     * @return $this
     */
    public function setFinancial($financial)
    {
        $this->container['financial'] = $financial;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


