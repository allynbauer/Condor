<?php
class userdata {
	protected $_aMethods=array('GET','POST','REQUEST','COOKIE','SESSION');
	protected $_aData=array();
	protected $_aMONTHS_SHORT=array("1"=>"Jan","2"=>"Feb","3"=>"Mar","4"=>"Apr","5"=>"May",
												               "6"=>"Jun","7"=>"Jul","8"=>"Aug","9"=>"Sep","10"=>"Oct",
																"11"=>"Nov","12"=>"Dec");
	protected $_aMONTHS_LONG=array("1"=>"January","2"=>"February","3"=>"March","4"=>"April","5"=>"May",
			   								                    "6"=>"June","7"=>"July","8"=>"August","9"=>"September","10"=>"October",
																"11"=>"November","12"=>"December");
	protected $_aPROTOCOLS=array('tcp'=>'tcp','udp'=>'udp');
	protected $_aSIZES=array('S','M','L','XL','XXL','XXXL');
	protected $_aRegions=array("AF"=>"Africa",
    	            "AS"=>"Asia",
                    "AU"=>"Australia/New Zealand",
            	    "EU"=>"Europe",
                    "NA"=>"North America",
	            "SA"=>"South America");
	protected $_aCountries=array(
             "AF"=>"AFGHANISTAN",
             "AL"=>"ALBANIA",
             "DZ"=>"ALGERIA",
             "AS"=>"AMERICAN SAMOA",
             "AD"=>"ANDORRA",
             "AO"=>"ANGOLA",
             "AI"=>"ANGUILLA",
             "AQ"=>"ANTARCTICA",
             "AG"=>"ANTIGUA AND BARBUDA",
             "AR"=>"ARGENTINA",
             "AM"=>"ARMENIA",
             "AW"=>"ARUBA",
             "AU"=>"AUSTRALIA",
             "AT"=>"AUSTRIA",
             "AZ"=>"AZERBAIJAN",
             "BS"=>"BAHAMAS",
             "BH"=>"BAHRAIN",
             "BD"=>"BANGLADESH",
             "BB"=>"BARBADOS",
             "BY"=>"BELARUS",
             "BE"=>"BELGIUM",
             "BZ"=>"BELIZE",
             "BJ"=>"BENIN",
             "BM"=>"BERMUDA",
             "BT"=>"BHUTAN",
             "BO"=>"BOLIVIA",
             "BA"=>"BOSNIA AND HERZEGOWINA",
             "BW"=>"BOTSWANA",
             "BV"=>"BOUVET ISLAND",
             "BR"=>"BRAZIL",
             "IO"=>"BRITISH INDIAN OCEAN TERRITORY",
             "BN"=>"BRUNEI DARUSSALAM",
             "BG"=>"BULGARIA",
             "BF"=>"BURKINA FASO",
             "BI"=>"BURUNDI",
             "KH"=>"CAMBODIA",
             "CM"=>"CAMEROON",
             "CA"=>"CANADA",
             "CV"=>"CAPE VERDE",
             "KY"=>"CAYMAN ISLANDS",
             "CF"=>"CENTRAL AFRICAN REPUBLIC",
             "TD"=>"CHAD",
             "CL"=>"CHILE",
             "CN"=>"CHINA",
             "CX"=>"CHRISTMAS ISLAND",
             "CC"=>"COCOS (KEELING) ISLANDS",
             "CO"=>"COLOMBIA",
             "KM"=>"COMOROS",
             "CG"=>"CONGO",
             "CK"=>"COOK ISLANDS",
             "CR"=>"COSTA RICA",
             "CI"=>"COTE D'IVOIRE",
             "HR"=>"CROATIA (local name: Hrvatska)",
             "CU"=>"CUBA",
             "CY"=>"CYPRUS",
             "CZ"=>"CZECH REPUBLIC",
             "DK"=>"DENMARK",
             "DJ"=>"DJIBOUTI",
             "DM"=>"DOMINICA",
             "DO"=>"DOMINICAN REPUBLIC",
             "TP"=>"EAST TIMOR",
             "EC"=>"ECUADOR",
             "EG"=>"EGYPT",
             "SV"=>"EL SALVADOR",
             "GQ"=>"EQUATORIAL GUINEA",
             "ER"=>"ERITREA",
             "EE"=>"ESTONIA",
             "ET"=>"ETHIOPIA",
             "EU"=>"EUROPE",
             "FK"=>"FALKLAND ISLANDS (MALVINAS)",
             "FO"=>"FAROE ISLANDS",
             "FJ"=>"FIJI",
             "FI"=>"FINLAND",
             "FR"=>"FRANCE",
             "FX"=>"FRANCE, METROPOLITAN",
             "GF"=>"FRENCH GUIANA",
             "PF"=>"FRENCH POLYNESIA",
             "TF"=>"FRENCH SOUTHERN TERRITORIES",
             "GA"=>"GABON",
             "GM"=>"GAMBIA",
             "GE"=>"GEORGIA",
             "DE"=>"GERMANY",
             "GH"=>"GHANA",
             "GI"=>"GIBRALTAR",
             "GR"=>"GREECE",
             "GL"=>"GREENLAND",
             "GD"=>"GRENADA",
             "GP"=>"GUADELOUPE",
             "GU"=>"GUAM",
             "GT"=>"GUATEMALA",
             "GN"=>"GUINEA",
             "GW"=>"GUINEA-BISSAU",
             "GY"=>"GUYANA",
             "HT"=>"HAITI",
             "HM"=>"HEARD AND MC DONALD ISLANDS",
             "HN"=>"HONDURAS",
             "HK"=>"HONG KONG",
             "HU"=>"HUNGARY",
             "IS"=>"ICELAND",
             "IN"=>"INDIA",
             "ID"=>"INDONESIA",
             "IR"=>"IRAN (ISLAMIC REPUBLIC OF)",
             "IQ"=>"IRAQ",
             "IE"=>"IRELAND",
             "IL"=>"ISRAEL",
             "IT"=>"ITALY",
             "JM"=>"JAMAICA",
             "JP"=>"JAPAN",
             "JO"=>"JORDAN",
             "KZ"=>"KAZAKHSTAN",
             "KE"=>"KENYA",
             "KI"=>"KIRIBATI",
             "KP"=>"KOREA, DEMOCRATIC PEOPLE'S REPUBLIC OF",
             "KR"=>"KOREA, REPUBLIC OF",
             "KW"=>"KUWAIT",
             "KG"=>"KYRGYZSTAN",
             "LA"=>"LAO PEOPLE'S DEMOCRATIC REPUBLIC",
             "LV"=>"LATVIA",
             "LB"=>"LEBANON",
             "LS"=>"LESOTHO",
             "LR"=>"LIBERIA",
             "LY"=>"LIBYAN ARAB JAMAHIRIYA",
             "LI"=>"LIECHTENSTEIN",
             "LT"=>"LITHUANIA",
             "LU"=>"LUXEMBOURG",
             "MO"=>"MACAU",
             "MK"=>"MACEDONIA",
	             "MG"=>"MADAGASCAR",
             "MW"=>"MALAWI",
             "MY"=>"MALAYSIA",
             "MV"=>"MALDIVES",
             "ML"=>"MALI",
             "MT"=>"MALTA",
             "MH"=>"MARSHALL ISLANDS",
             "MQ"=>"MARTINIQUE",
             "MR"=>"MAURITANIA",
             "MU"=>"MAURITIUS",
             "YT"=>"MAYOTTE",
             "MX"=>"MEXICO",
             "FM"=>"MICRONESIA,FEDERATED STATES OF",
             "MD"=>"MOLDOVA",
             "MC"=>"MONACO",
             "MN"=>"MONGOLIA",
             "MS"=>"MONTSERRAT",
             "MA"=>"MOROCCO",
             "MZ"=>"MOZAMBIQUE",
             "MM"=>"MYANMAR",
             "NA"=>"NAMIBIA",
             "NR"=>"NAURU",
             "NP"=>"NEPAL",
             "AN"=>"NETHERLANDS ANTILLES",
             "NL"=>"NETHERLANDS",
             "NC"=>"NEW CALEDONIA",
             "NZ"=>"NEW ZEALAND",
             "NI"=>"NICARAGUA",
             "NE"=>"NIGER",
             "NG"=>"NIGERIA",
             "NU"=>"NIUE",
             "NF"=>"NORFOLK ISLAND",
             "MP"=>"NORTHERN MARIANA ISLANDS",
             "NO"=>"NORWAY",
             "OM"=>"OMAN",
             "PK"=>"PAKISTAN",
             "PW"=>"PALAU",
             "PS"=>"PALESTINIAN TERRITORY",
             "PA"=>"PANAMA",
             "PG"=>"PAPUA NEW GUINEA",
             "PY"=>"PARAGUAY",
             "PE"=>"PERU",
             "PH"=>"PHILIPPINES",
             "PN"=>"PITCAIRN",
	           "PL"=>"POLAND",
             "PT"=>"PORTUGAL",
             "PR"=>"PUERTO RICO",
             "QA"=>"QATAR",
             "XX"=>"RESERVED",
             "RE"=>"REUNION",
             "RO"=>"ROMANIA",
             "RU"=>"RUSSIAN FEDERATION",
             "RW"=>"RWANDA",
             "KN"=>"SAINT KITTS AND NEVIS",
             "LC"=>"SAINT LUCIA",
             "VC"=>"SAINT VINCENT AND THE GRENADINES",
             "WS"=>"SAMOA",
             "SM"=>"SAN MARINO",
             "ST"=>"SAO TOME AND PRINCIPE",
             "SA"=>"SAUDI ARABIA",
             "SN"=>"SENEGAL",
             "CS"=>"SERBIA AND MONTENEGRO",
             "SC"=>"SEYCHELLES",
             "SL"=>"SIERRA LEONE",
             "SG"=>"SINGAPORE",
             "SK"=>"SLOVAKIA (Slovak Republic)",
             "SI"=>"SLOVENIA",
             "SB"=>"SOLOMON ISLANDS",
             "SO"=>"SOMALIA",
             "ZA"=>"SOUTH AFRICA",
             "ES"=>"SPAIN",
             "LK"=>"SRI LANKA",
             "SH"=>"ST. HELENA",
             "PM"=>"ST. PIERRE AND MIQUELON",
             "SD"=>"SUDAN",
             "SR"=>"SURINAME",
             "SJ"=>"SVALBARD AND JAN MAYEN ISLANDS",
             "SZ"=>"SWAZILAND",
             "SE"=>"SWEDEN",
             "CH"=>"SWITZERLAND",
             "SY"=>"SYRIAN ARAB REPUBLIC",
             "TW"=>"TAIWAN",
             "TJ"=>"TAJIKISTAN",
             "TZ"=>"TANZANIA, UNITED REPUBLIC OF",
             "TH"=>"THAILAND",
             "CD"=>"THE DEMOCRATIC REPUBLIC OF THE CONGO",
             "TL"=>"TIMOR-LESTE",
             "TG"=>"TOGO",
             "TK"=>"TOKELAU",
             "TO"=>"TONGA",
             "TT"=>"TRINIDAD AND TOBAGO",
             "TN"=>"TUNISIA",
             "TR"=>"TURKEY",
             "TM"=>"TURKMENISTAN",
             "TC"=>"TURKS AND CAICOS ISLANDS",
             "TV"=>"TUVALU",
             "UG"=>"UGANDA",
             "UA"=>"UKRAINE",
             "AE"=>"UNITED ARAB EMIRATES",
             "GB"=>"UNITED KINGDOM",
             "UM"=>"UNITED STATES MINOR OUTLYING ISLANDS",
             "US"=>"UNITED STATES",
             "UY"=>"URUGUAY",
             "UZ"=>"UZBEKISTAN",
             "VU"=>"VANUATU",
             "VA"=>"VATICAN CITY STATE (HOLY SEE)",
             "VE"=>"VENEZUELA",
             "VN"=>"VIET NAM",
             "VG"=>"VIRGIN ISLANDS (BRITISH)",
             "VI"=>"VIRGIN ISLANDS (U.S.)",
             "WF"=>"WALLIS AND FUTUNA ISLANDS",
             "EH"=>"WESTERN SAHARA",
             "YE"=>"YEMEN",
             "YU"=>"YUGOSLAVIA",
             "ZR"=>"ZAIRE",
             "ZM"=>"ZAMBIA",
             "ZW"=>"ZIMBABWE"
	);
	protected $aTLDs=array(
                  "AC","AD","AE","AERO","AF","AG","AI","AL","AM","AN","AO",
                  "AQ",   "AR","ARPA","AS","ASIA",
                  "AT",
                  "AU",
                  "AW",
                  "AX",
                  "AZ",
                  "BA",
                  "BB",
                  "BD",
                  "BE",
                  "BF",
                  "BG",
                  "BH",
                  "BI",
                  "BIZ",
                  "BJ",
                  "BM",
                  "BN",
                  "BO",
                  "BR",
                  "BS",
                  "BT",
                  "BV",
                  "BW",
                  "BY",
                  "BZ",
                  "CA",
                  "CAT",
                  "CC",
                  "CD",
                  "CF",
                  "CG",
                  "CH",
                  "CI",
                  "CK",
                  "CL",
                  "CM",
                  "CN",
                  "CO",
                  "COM",
                  "COOP",
                  "CR",
                  "CU",
                  "CV",
                  "CX",
                  "CY",
                  "CZ",
                  "DE",
                  "DJ",
                  "DK",
                  "DM",
                  "DO",
                  "DZ",
                  "EC",
                  "EDU",
                  "EE",
                  "EG",
                  "ER",
                  "ES",
                  "ET",
                  "EU",
                  "FI",
                  "FJ",
                  "FK",
                  "FM",
                  "FO",
                  "FR",
                  "GA",
                  "GB",
                  "GD",
                  "GE",
                  "GF",
                  "GG",
                  "GH",
                  "GI",
                  "GL",
                  "GM",
                  "GN",
                  "GOV",
                  "GP",
                  "GQ",
                  "GR",
                  "GS",
                  "GT",
                  "GU",
                  "GW",
                  "GY",
                  "HK",
                  "HM",
                  "HN",
                  "HR",
                  "HT",
                  "HU",
                  "ID",
                  "IE",
                  "IL",
                  "IM",
                  "IN",
                  "INFO",
                  "INT",
                  "IO",
                  "IQ",
                  "IR",
                  "IS",
                  "IT",
                  "JE",
                  "JM",
                  "JO",
                  "JOBS",
                  "JP",
                  "KE",
                  "KG",
                  "KH",
                  "KI",
                  "KM",
                  "KN",
                  "KP",
                  "KR",
                  "KW",
                  "KY",
                  "KZ",
                  "LA",
                  "LB",
                  "LC",
                  "LI",
                  "LK",
                  "LR",
                  "LS",
                  "LT",
                  "LU",
                  "LV",
                  "LY",
                  "MA",
                  "MC",
                  "MD",
                  "ME",
                  "MG",
                  "MH",
                  "MIL",
                  "MK",
                  "ML",
                  "MM",
                  "MN",
                  "MO",
                  "MOBI",
                  "MP",
                  "MQ",
                  "MR",
                  "MS",
                  "MT",
                  "MU",
                  "MUSEUM",
                  "MV",
                  "MW",
                  "MX",
                  "MY",
                  "MZ",
                  "NA",
                  "NAME",
                  "NC",
                  "NE",
                  "NET",
                  "NF",
                  "NG",
                  "NI",
                  "NL",
                  "NO",
	             "NP",
                  "NR",
                  "NU",
                  "NZ",
                  "OM",
                  "ORG",
                  "PA",
                  "PE",
                  "PF",
                  "PG",
                  "PH",
                  "PK",
                  "PL",
                  "PM",
                  "PN",
                  "PR",
                  "PRO",
                  "PS",
                  "PT",
                  "PW",
                  "PY",
                  "QA",
                  "RE",
                  "RO",
                  "RS",
                  "RU",
                  "RW",
                  "SA",
                  "SB",
                  "SC",
                  "SD",
                  "SE",
                  "SG",
                  "SH",
                  "SI",
                  "SJ",
                  "SK",
                  "SL",
                  "SM",
                  "SN",
                  "SO",
                  "SR",
                  "ST",
                  "SU",
                  "SV",
                  "SY",
                  "SZ",
                  "TC",
                  "TD",
                  "TEL",
                  "TF",
                  "TG",
                  "TH",
                  "TJ",
                  "TK",
                  "TL",
                  "TM",
                  "TN",
                  "TO",
                  "TP",
                  "TR",
                  "TRAVEL",
                  "TT",
                  "TV",
                  "TW",
                  "TZ",
                  "UA",
                  "UG",
                  "UK",
                  "US",
                  "UY",
                  "UZ",
                  "VA",
                  "VC",
                  "VE",
                  "VG",
                  "VI",
                  "VN",
                  "VU",
                  "WF",
                  "WS",
                  "YE",
                  "YT",
                  "YU",
                  "ZA",
                  "ZM",
                  "ZW");
	
	private $_aStates=array(
"AL"=>"Alabama",
"AK"=>"Alaska",
"AZ"=>"Arizona",
"AR"=>"Arkansas",
"CA"=>"California",
"CO"=>"Colorado",
"CT"=>"Connecticut",
"DE"=>"Delaware",
"DC"=>"District of Columbia",
"FL"=>"Florida",
"GA"=>"Georgia",
"HI"=>"Hawaii",
"ID"=>"Idaho",
"IL"=>"Illinois",
"IN"=>"Indiana",
"IA"=>"Iowa",
"KS"=>"Kansas",
"KY"=>"Kentucky",
"LA"=>"Louisiana",
"ME"=>"Maine",
"MD"=>"Maryland",
"MA"=>"Massachusetts",
"MI"=>"Michigan",
"MN"=>"Minnesota",
"MS"=>"Mississippi",
"MO"=>"Missouri",
"MT"=>"Montana",
"NE"=>"Nebraska",
"NV"=>"Nevada",
"NH"=>"New Hampshire",
"NJ"=>"New Jersey",
"NM"=>"New Mexico",
"NY"=>"New York",
"NC"=>"North Carolina",
"ND"=>"North Dakota",
"OH"=>"Ohio",
"OK"=>"Oklahoma",
"OR"=>"Oregon",
"PA"=>"Pennsylvania",
"RI"=>"Rhode Island",
"SC"=>"South Carolina",
"SD"=>"South Dakota",
"TN"=>"Tennessee",
"TX"=>"Texas",
"UT"=>"Utah",
"VT"=>"Vermont",
"VA"=>"Virginia",
"WA"=>"Washington",
"WV"=>"West Virginia",
"WI"=>"Wisconsin",
"WY"=>"Wyoming",
"AA"=>"Armed Forces the Americas",
"AE"=>"Armed Forces Europe",
"AP"=>"Armed Forces Pacific",
"AB"=>"Alberta",
"BC"=>"British Columbia",
"MB"=>"Manitoba",
"NB"=>"New Brunswick",
"NL"=>"Newfoundland",
"NT"=>"Northwest Territories",
"NS"=>"Nova Scotia",
"NU"=>"Nunavut",
"ON"=>"Ontario",
"PE"=>"Prince Edward Island",
"QC"=>"Quebec",
"SK"=>"Saskatchewan",
"YT"=>"Yukon");
	
	private $_TZs=array(
	"0"=>" 00:00 (GMT/UTC)",
"-720"=>"-12:00",
"-660"=>"-11:00",
"-600"=>"-10:00 (HST)",
"-570"=>"-09:30",
"-540"=>"-09:00",
"-480"=>"-08:00 (PST)",
"-420"=>"-07:00 (MST)",
"-360"=>"-06:00 (CST)",
"-300"=>"-05:00 (EST)",
"-240"=>"-04:00",
"-210"=>"-03:30 (NFT)",
"-180"=>"-03:00",
"-150"=>"-02:30 (NDT)",
"-120"=>"-02:00",
"-60"=>"-01:00",
"0"=>" 00:00 (GMT/UTC)",
"60"=>"+01:00 (CET)",
"120"=>"+02:00 (EET)",
"180"=>"+03:00",
"210"=>"+03:30 (Iran)",
"240"=>"+04:00",
"300"=>"+05:00",
"330"=>"+05:30 (IST)",
"360"=>"+06:00",
"390"=>"+06:30",
"420"=>"+07:00",
"450"=>"+07:30",
"480"=>"+08:00",
"510"=>"+08:30",
"540"=>"+09:00",
"570"=>"+09:30",
"600"=>"+10:00",
"630"=>"+10:30",
"660"=>"+11:00",
"690"=>"+11:30",
"720"=>"+12:00",
"765"=>"+12:45",
"780"=>"+13:00",
"810"=>"+14:00" );
	
	/**
	 * construct the class. this will copy the global array into our local class.
	 *
	 * @param string $sMethod method to be used. case insensitive.
	 * @return true or false
	 */
	function __construct($sMethod) {
		$sMethod=strtoupper($sMethod);
		if (!in_array($sMethod,$this->_aMethods)) {
			$this->_error("bad method specified in constructor");
			return FALSE;
		}
		// we can not use variable variables for super globals. It is sort of possible by declaring
		// them explicity as global. But this solution appears cleaner even though not elegant.
		switch ($sMethod) {
			case 'GET':
				$this->_retrieve($_GET);
				break;
			case 'POST':
				$this->_retrieve($_POST);
				break;
			case 'REQUEST':
				$this->_retrieve($_REQUEST);
				break;
			case 'COOKIE':
				$this->_retrieve($_COOKIE);
				break;
			case 'SESSION':
				$this->_retrieve($_SESSION);
				break;
		}
		return TRUE;
	}
	/**
	 * method to copy data from global array to local aData
	 *
	 * @param array $aArray
	 * @return true
	 */
	function _retrieve($aArray) {
		foreach ( $aArray as $sKey=>$sValue) {
			$this->_aData[$sKey]=$sValue;
		}
		return TRUE;
	}
	/**
	 * Retrieve data from aData. Make sure key actually exists to avoid warnings
	 *
	 * @param string $sKey
	 * @return mixed
	 */
	function _get($sKey) {
		if ( key_exists($sKey,$this->_aData) ) {
			return $this->_aData[$sKey];
		}
		return FALSE;
	}	
	/**
	 * Add more data from another array. Could be used to add GET data after POST
	 *
	 * @param array $aArray
	 */
	function add($aArray) {
		foreach ($aArray as $sKey => $sValue) {
			$this->_aData[$sKey]=$sValue;
		}		
	}
	/**
	 * This funciton doesn't do much at all. It just returns the text unfiltered
	 *
	 * @param string $sKey
	 * @return string
	 */
	function getunfilteredtext($sKey) {
		return $this->_get($sKey);	
	}
	function gettext($sKey) {
	   return $this->_get($sKey);
	}
	function gethtmlsafetext($sKey) {
		return htmlentities($this->_get($sKey));
	}
	function gethex($sKey) {
		$sValue=$this->_get($sKey);
		if ( $sValue ) {
			if ( preg_match('/^[0-9a-f]+$/i',$sValue) ) {
				return $sValue;
			}		
		}
		return FALSE;
	}
	function getphone($sKey) {
		$sValue=$this->_get($sKey);
		if ( $sValue ) {
			if ( preg_match('/^\+?[0-9()\-\ ]+$/',$sValue)) {
				return $sValue;
			}
		}
		return FALSE;
	}
	function getport($sKey) {
		$sValue=$this->_get($sKey);
		if ( $sValue && is_int($sValue)) {
			if ( $sValue>=0 && $sValue<=65535 ) {
				return $sValue;
			}
		}
		return FALSE;
	}
	function getemail($sKey) {
		$sValue=$this->_get($sKey);
		if ( ereg("^([a-zA-Z0-9=_\-\.\+-\'\\&]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|([a-zA-Z0-9\.\-]+))\.([a-zA-Z]{2,4}|[0-9]{1,4})(\]?)$",$sValue) ) 
		{
        	if ( !ereg("@.*@", $sValue)) 
        	{
            	return $sValue;
        	}	
    	}
    	return FALSE;
	}
	function getintrange($sKey,$nMin=0,$nMax=PHP_INT_MAX){
		$sValue=$this->_get($sKey);
		// we add to zero here because is_int("0") == false ....
		if ( is_int($sValue+0) && $sValue>=$nMin && $sValue<=$nMax ) {
			return $sValue;
		}
		return FALSE;
	}
	function gethostname($sKey) {
		$sValue=$this->_get($sKey);
		$sValue=strtoupper($sValue);
		if ( preg_match("/^[0-9a-z\-\.]+$/",$sValue)) {
			$aSplit=explode('.',$sValue);
			foreach ( $aSplit as $sPart ) {
				if ( preg_match('/^-/',$sPart) || preg_match('/-$/',$sPart) ) {
					return FALSE;
				}
				if ( strlen($sPart)>63) {
					return FALSE;
				}
			}
			if ( in_array($sPart,$this->_aTLDs)) {
				return $sValue;
			}
		}
		return FALSE;
	}
	function getip($sKey) {
		$sValue=$this->getipv4($sKey);
		if ( ! $sValue ) {
			return $this->getipv6($sKey);
		}
		return $sValue;
	}
	function getipv4($sKey) {
		$sValue=$this->_get($sKey);
		if ( preg_match('/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/',$sValue )) {
			$x=ip2long($sValue);
			$x=long2ip($x);
			if ( $x==$sValue) {
				return $x;
			}
		}
		return FALSE;
	}
	function getipv6($sKey) {
		$sValue=$this->_get($sKey);
		if ( preg_match('/^[0-9A-F:]+$/i',$sValue) ) {
			return $sValue;
		}
		return FALSE;	
	}	
	function test($sKey,$sTest) {
		$sValue=$this->_get($sKey);
		if ( $sValue==$sTest) {
			return TRUE;
		}
		return FALSE;
	}
	function getsqldate($sKey) {
		$sValue=$this->_get($sKey);
		if ( preg_match('/^([0-9]{4})-([01][0-9])-([0-3][0-9])$/',$sValue,$aMatches)) {
			if ( $aMatches[1]>2100 || $aMatches[1]<1900 ) {
				return FALSE;	
			}
			if ( $aMatches[2]>12 || $aMatches[2]<1 ) {
				return FALSE;
			}
			if ( $aMatches[3]>31 || $aMatches[3]<1 ) {
				return FALSE;
			}
			return $sValue;
		}
		return FALSE;
	}
	function gettime($sKey) {
		$sValue=$this->_get($sKey);
		if ( preg_match("/^[0-9]{2}:[0-5][0-9]:[0-5][0-9]$/",$sValue)) {
			return $sValue;
		}
		return FALSE;
	}
	function getlist($sKey,$aList) {
		$sValue=$this->_get($sKey);
		if ( $sValue && key_exists($sValue,$aList)) {
			return $sValue;
		}
		return FALSE;
	}
	function getyn($sKey) {
		$sValue=strtoupper($this->_get($sKey));
		if ( $sValue == 'Y' || $sValue=='N' ) {
			return $sValue;
		}
		return FALSE;
	}

	function getcountry($sKey) {
		$sValue=strtoupper($this->_get($sKey));
		if ( key_exists($sValue,$this->_aCountries)) {
			return $sValue;
		}
		return FALSE;
	}
	function getstate($sKey,$sCountry='US') {
		$sValue=strtoupper($this->_get($sKey));
		if ( $sCountry=='US' || $sCountry=='CA')
		{
			if ( key_exists($sValue,$this->_aStates))
			{
				return $sValue;
			}
		}
		return FALSE;
	}
	function getzip($sKey,$sCountry='US') {
		$sValue=strtoupper($this->_get($sKey));
		$sValue=trim($sValue);
 	    if ( $sCountry=='US' ) {
		    if ( ereg("^[0-9]{5}$",$sValue) ) {
		    	return $sValue;
		    }
    		if ( ereg("^[0-9]{5}[ -]?[0-9]{4}$",$sValue) ) {
    			return $sValue;
    		}
    		return FALSE;    		
  		}
 		if ( $sCountry=='CA' ) {	
    		if ( ereg("^[A-Z][0-9][A-Z][ -]?[0-9][A-Z][0-9]$",$sValue) ) {
    			return $sValue;
    		}
    		return FALSE;
  		}
  		if ( $sCountry=='GB' ) {
    		if ( ereg("^[A-Z][A-Z0-9]{1,4}[ -]?[0-9A-Z]{3}$",$sValue) ) {
    			return $sValue;
    		}
    		return FALSE;
  		}
  		if ( $sCountry=='AU' ) {
    		if ( ereg("^[0-9]{4}$",$sValue) ) {
    			return $sValue;
    		}
    		return FALSE;
  		}
  		if ( $sCountry=='DE' ) {
    		if ( ereg("^[0-9]{5}$",$sValue) ) {
    			return $sValue;
    		}
    		return FALSE;
  		}
  		if ( $sCountry=='IND' ) {
    		if ( ereg("^[0-9]{6}$",$sValue) ) {
    			return $sValue;
    		}
    		return FALSE;
  		}
  
 		if ( ereg("^[A-Z0-9 -]+$",$sValue)) {
 			return $sValue;
 		}
  		return FALSE;
		
	}
	function getname($sKey) {
		$sValue=$this->_get($sKey);
		if ( $this->_checkregex($sValue,"/^[0-9A-Z\.\-\'\ ]+$/i")) {
			return $sValue;
		}
		return FALSE;
	}
	function getaddress($sKey) {
		$sValue=$this->_get($sKey);
		if ( $this->_checkregex($sValue,"/^[0-9A-Z\.\-\'\ ]+$/i")) {
			return $sValue;
		}
		return FALSE;
	}
	function getcity($sKey) {
	  return $this->getaddress($sKey);
	}
	function getccnumber($sKey) {
		$sValue=$this->_get($sKey);		
  		$sValue=preg_replace("/[^0-9]/","",$sValue);
  		$ccnum=strrev($sValue);
  		for ( $ndx=0;$ndx<strlen($ccnum);++$ndx) {
    		$digits .= ($ndx %2) ? $ccnum[$ndx]*2 : $ccnum[$ndx];
  		}
  		for ( $ndx=0;$ndx<strlen($digits);++$ndx) {
    		$sum += $digits[$ndx];
		}
  		if ( ($sum % 10)==0 ) {
  			return $sValue;
  		}
  		return FALSE;
	}
	
	function _error($sMessage) {
		$sErrorPage = "/index.html";
		header ( "Location: $sErrorPage" );
		error_log ( $sMessage );
		exit ();
	}
		
	function _checkregex($sValue,$sRegex) {
             if ( preg_match($sRegex,$sValue)) {
                  return $sValue;
                }
                return FALSE;
        }
	
	
}
?>
