<?php
namespace OnyxUser\Form;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ArraySerializable as ArraySerializable;
use Zend\Stdlib\Hydrator\ObjectProperty as ObjectProperty; 
use OnyxUser\Model\User;

class UserFieldset extends Fieldset implements InputFilterProviderInterface
{

    public function __construct()
    {
        parent::__construct('User');
                $this->setHydrator(new ArraySerializable(false))
                     ->setObject(new User());
                $this->setLabel('User');        
                
            
            $this->add(array(
                'name' => 'id',
                'type' => 'Zend\Form\Element\Hidden',
                'options' => array(
                    'label' => 'id'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'username',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'username'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'password',
                'type' => 'Zend\Form\Element\Password',
                'options' => array(
                    'label' => 'password'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'salt',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'salt'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'firstname',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'firstname'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'lastname',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'lastname'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'phone',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'phone'
                ),
                'attributes' => array(
                )
            ));

        
            $this->add(array(
                'name' => 'mobile',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'mobile'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'email',
                'type' => 'Zend\Form\Element\Email',
                'options' => array(
                    'label' => 'email'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));
            
            $this->add(array(
                'name' => 'address',
                'type' => 'Zend\Form\Element\Textarea',
                'options' => array(
                    'label' => 'Office Location'
                ),
                'attributes' => array(                   
                    'class' => 'form-control',
                    'placeholder' => 'Office Location'
                )
            ));
            
            $this->add(array(
                'name' => 'business_name',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'business_name'
                ),
                'attributes' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Name'
                )
            ));
        
            $this->add(array(
                'name' => 'twitter',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'twitter'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'passwordhint',
                'type' => 'Zend\Form\Element\Textarea',
                'options' => array(
                    'label' => 'passwordhint'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'gender',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'gender'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'dateofbirth',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'dateofbirth'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'facebookid',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'facebookid'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'phoneguid',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'phoneguid'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'subscribe',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'subscribe'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'mobilesubscribe',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'mobilesubscribe'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'role',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'role'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'terms',
                'type' => 'Zend\Form\Element\Checkbox',
                'options' => array(
                    'label' => 'terms'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'facebookdata',
                'type' => 'Zend\Form\Element\Textarea',
                'options' => array(
                    'label' => 'facebookdata'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'token',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'token'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'isactive',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'isactive'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'logindate',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'logindate'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'lastupdate',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'lastupdate'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));

        
            $this->add(array(
                'name' => 'postdate',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'postdate'
                ),
                'attributes' => array(
                    'required' => 'required'
                )
            ));
            
            $this->add(array(
                'name' => 'country',
                'type' => 'Zend\Form\Element\Select',
                'options' => array(
                    'label' => 'Country',
                    'empty_option' => 'Country',
                    'value_options' => array(
                            'AFG' => 'Afghanistan',
                            'ALB' => 'Albania',
                            'DZA' => 'Algeria',
                            'ASM' => 'American Samoa',
                            'AND' => 'Andorra',
                            'AGO' => 'Angola',
                            'AIA' => 'Anguilla',
                            'ATA' => 'Antarctica',
                            'ARG' => 'Argentina',
                            'ARM' => 'Armenia',
                            'ABW' => 'Aruba',
                            'AUS' => 'Australia',
                            'AUT' => 'Austria',
                            'AZE' => 'Azerbaijan',
                            'BHS' => 'Bahamas',
                            'BHR' => 'Bahrain',
                            'BGD' => 'Bangladesh',
                            'BRB' => 'Barbados',
                            'BLR' => 'Belarus',
                            'BEL' => 'Belgium',
                            'BLZ' => 'Belize',
                            'BEN' => 'Benin',
                            'BMU' => 'Bermuda',
                            'BTN' => 'Bhutan',
                            'BOL' => 'Bolivia',
                            'BIH' => 'Bosnia and Herzegovina',
                            'BWA' => 'Botswana',
                            'BRA' => 'Brazil',
                            'VGB' => 'British Virgin Islands',
                            'BRN' => 'Brunei',
                            'BGR' => 'Bulgaria',
                            'BFA' => 'Burkina Faso',
                            'BDI' => 'Burundi',
                            'KHM' => 'Cambodia',
                            'CMR' => 'Cameroon',
                            'CAN' => 'Canada',
                            'CPV' => 'Cape Verde',
                            'CYM' => 'Cayman Islands',
                            'CAF' => 'Central African Republic',
                            'CHL' => 'Chile',
                            'CHN' => 'China',
                            'COL' => 'Colombia',
                            'COM' => 'Comoros',
                            'COK' => 'Cook Islands',
                            'CRI' => 'Costa Rica',
                            'HRV' => 'Croatia',
                            'CUB' => 'Cuba',
                            'CUW' => 'Curacao',
                            'CYP' => 'Cyprus',
                            'CZE' => 'Czech Republic',
                            'COD' => 'Democratic Republic of Congo',
                            'DNK' => 'Denmark',
                            'DJI' => 'Djibouti',
                            'DMA' => 'Dominica',
                            'DOM' => 'Dominican Republic',
                            'TLS' => 'East Timor',
                            'ECU' => 'Ecuador',
                            'EGY' => 'Egypt',
                            'SLV' => 'El Salvador',
                            'GNQ' => 'Equatorial Guinea',
                            'ERI' => 'Eritrea',
                            'EST' => 'Estonia',
                            'ETH' => 'Ethiopia',
                            'FLK' => 'Falkland Islands',
                            'FRO' => 'Faroe Islands',
                            'FJI' => 'Fiji',
                            'FIN' => 'Finland',
                            'FRA' => 'France',
                            'PYF' => 'French Polynesia',
                            'GAB' => 'Gabon',
                            'GMB' => 'Gambia',
                            'GEO' => 'Georgia',
                            'DEU' => 'Germany',
                            'GHA' => 'Ghana',
                            'GIB' => 'Gibraltar',
                            'GRC' => 'Greece',
                            'GRL' => 'Greenland',
                            'GLP' => 'Guadeloupe',
                            'GUM' => 'Guam',
                            'GTM' => 'Guatemala',
                            'GIN' => 'Guinea',
                            'GNB' => 'Guinea-Bissau',
                            'GUY' => 'Guyana',
                            'HTI' => 'Haiti',
                            'HND' => 'Honduras',
                            'HKG' => 'Hong Kong',
                            'HUN' => 'Hungary',
                            'ISL' => 'Iceland',
                            'IND' => 'India',
                            'IDN' => 'Indonesia',
                            'IRN' => 'Iran',
                            'IRQ' => 'Iraq',
                            'IRL' => 'Ireland',
                            'IMN' => 'Isle of Man',
                            'ISR' => 'Israel',
                            'ITA' => 'Italy',
                            'CIV' => 'Ivory Coast',
                            'JAM' => 'Jamaica',
                            'JPN' => 'Japan',
                            'JOR' => 'Jordan',
                            'KAZ' => 'Kazakhstan',
                            'KEN' => 'Kenya',
                            'KIR' => 'Kiribati',
                            'XKX' => 'Kosovo',
                            'KWT' => 'Kuwait',
                            'KGZ' => 'Kyrgyzstan',
                            'LAO' => 'Laos',
                            'LVA' => 'Latvia',
                            'LBN' => 'Lebanon',
                            'LSO' => 'Lesotho',
                            'LBR' => 'Liberia',
                            'LBY' => 'Libya',
                            'LIE' => 'Liechtenstein',
                            'LTU' => 'Lithuania',
                            'LUX' => 'Luxembourg',
                            'MAC' => 'Macau',
                            'MKD' => 'Macedonia',
                            'MDG' => 'Madagascar',
                            'MWI' => 'Malawi',
                            'MYS' => 'Malaysia',
                            'MDV' => 'Maldives',
                            'MLI' => 'Mali',
                            'MLT' => 'Malta',
                            'MHL' => 'Marshall Islands',
                            'MRT' => 'Mauritania',
                            'MUS' => 'Mauritius',
                            'MEX' => 'Mexico',
                            'FSM' => 'Micronesia',
                            'MDA' => 'Moldova',
                            'MCO' => 'Monaco',
                            'MNG' => 'Mongolia',
                            'MNE' => 'Montenegro',
                            'MSR' => 'Montserrat',
                            'MAR' => 'Morocco',
                            'MOZ' => 'Mozambique',
                            'MMR' => 'Myanmar [Burma]',
                            'NAM' => 'Namibia',
                            'NRU' => 'Nauru',
                            'NPL' => 'Nepal',
                            'NLD' => 'Netherlands',
                            'NCL' => 'New Caledonia',
                            'NZL' => 'New Zealand',
                            'NIC' => 'Nicaragua',
                            'NER' => 'Niger',
                            'NGA' => 'Nigeria',
                            'NIU' => 'Niue',
                            'NFK' => 'Norfolk Island',
                            'PRK' => 'North Korea',
                            'MNP' => 'Northern Mariana Islands',
                            'NOR' => 'Norway',
                            'OMN' => 'Oman',
                            'PAK' => 'Pakistan',
                            'PLW' => 'Palau',
                            'PAN' => 'Panama',
                            'PNG' => 'Papua New Guinea',
                            'PRY' => 'Paraguay',
                            'PER' => 'Peru',
                            'PHL' => 'Philippines',
                            'PCN' => 'Pitcairn Islands',
                            'POL' => 'Poland',
                            'PRT' => 'Portugal',
                            'PRI' => 'Puerto Rico',
                            'QAT' => 'Qatar',
                            'COG' => 'Republic of the Congo',
                            'REU' => 'Reunion',
                            'ROU' => 'Romania',
                            'RUS' => 'Russia',
                            'RWA' => 'Rwanda',
                            'BLM' => 'Saint Barthélemy',
                            'SHN' => 'Saint Helena',
                            'KNA' => 'Saint Kitts and Nevis',
                            'LCA' => 'Saint Lucia',
                            'MAF' => 'Saint Martin',
                            'SPM' => 'Saint Pierre and Miquelon',
                            'VCT' => 'Saint Vincent and the Grenadines',
                            'WSM' => 'Samoa',
                            'SMR' => 'San Marino',
                            'STP' => 'Sao Tome and Principe',
                            'SAU' => 'Saudi Arabia',
                            'SEN' => 'Senegal',
                            'SRB' => 'Serbia',
                            'SYC' => 'Seychelles',
                            'SLE' => 'Sierra Leone',
                            'SGP' => 'Singapore',
                            'SVK' => 'Slovakia',
                            'SVN' => 'Slovenia',
                            'SLB' => 'Solomon Islands',
                            'SOM' => 'Somalia',
                            'ZAF' => 'South Africa',
                            'KOR' => 'South Korea',
                            'SSD' => 'South Sudan',
                            'ESP' => 'Spain',
                            'LKA' => 'Sri Lanka',
                            'SDN' => 'Sudan',
                            'SUR' => 'Suriname',
                            'SWZ' => 'Swaziland',
                            'SWE' => 'Sweden',
                            'CHE' => 'Switzerland',
                            'SYR' => 'Syria',
                            'TWN' => 'Taiwan',
                            'TJK' => 'Tajikistan',
                            'TZA' => 'Tanzania',
                            'THA' => 'Thailand',
                            'TGO' => 'Togo',
                            'TKL' => 'Tokelau',
                            'TTO' => 'Trinidad and Tobago',
                            'TUN' => 'Tunisia',
                            'TUR' => 'Turkey',
                            'TKM' => 'Turkmenistan',
                            'TUV' => 'Tuvalu',
                            'UGA' => 'Uganda',
                            'UKR' => 'Ukraine',
                            'ARE' => 'United Arab Emirates',
                            'GBR' => 'United Kingdom',
                            'USA' => 'United States',
                            'URY' => 'Uruguay',
                            'UZB' => 'Uzbekistan',
                            'VUT' => 'Vanuatu',
                            'VAT' => 'Vatican',
                            'VEN' => 'Venezuela',
                            'VNM' => 'Vietnam',
                            'ESH' => 'Western Sahara',
                            'YEM' => 'Yemen',
                            'ZMB' => 'Zambia',
                            'ZWE' => 'Zimbabwe',
                        )
                ),
                'attributes' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Country',
                    'id' => 'country'
                )
            ));
            $this->add(array(
                'required' => false,
                'name' => 'regions-AUS',
                'type' => 'Zend\Form\Element\Select',
                'options' => array(
                    'label' => 'Region',
                    'empty_option' => 'Please select a region',
                    'value_options' => array(
                            'ACT' => 'Australian Capital Territory',
                            'NSW' => 'New South Wales',
                            'NT' => 'Northern Territory',
                            'QLD' => 'Queensland',
                            'SA' => 'South Australia',
                            'TAS' => 'Tasmania',
                            'VIC' => 'Victoria',
                            'WA' => 'Western Australia',
                        )
                ),
                'attributes' => array(
                    'placeholder' => 'Region',
                    'id' => 'regions-AUS'
                )
            ));
            
            $this->add(array(
                'name' => 'regions-GBR',
                'required' => false,
                'type' => 'Zend\Form\Element\Select',
                'options' => array(
                    'label' => 'Region',
                    'empty_option' => 'Please select a region',
                    'value_options' => array(
                            'East' => 'East',
                            'East Midlands' => 'East Midlands',
                            'London' => 'London',
                            'North East' => 'North East',
                            'North West' => 'North West',
                            'Northern Ireland' => 'Northern Ireland',
                            'Scotland' => 'Scotland',
                            'South East' => 'South East',
                            'South West' => 'South West',
                            'Wales' => 'Wales',
                            'West Midlands' => 'West Midlands',
                            'Yorkshire and the Humber' => 'Yorkshire and the Humber',
                        )
                ),
                'attributes' => array(
                    'placeholder' => 'Region',
                    'id' => 'regions-GBR'
                )
            ));
            
            $this->add(array(
                'required' => false,
                'name' => 'regions-NZL',
                'type' => 'Zend\Form\Element\Select',
                'options' => array(
                    'label' => 'Region',
                    'empty_option' => 'Please select a region',
                    'value_options' => array(
                            'Northland' => 'Northland',
                            'Auckland' => 'Auckland',
                            'Waikato' => 'Waikato',
                            'Bay of Plenty' => 'Bay of Plenty',
                            'Gisborne' => 'Gisborne',
                            "Hawke's Bay" => "Hawke's Bay",
                            'Taranaki' => 'Taranaki',
                            'Manawatu-Whanaganui' => 'Manawatu-Whanaganui',
                            'Wellington' => 'Wellington',
                            'Tasman' => 'Tasman',
                            'Nelson' => 'Nelson',
                            'Marlborough' => 'Marlborough',
                            'West Coast' => 'West Coast',
                            'Canterbury' => 'Canterbury',
                            'Otago' => 'Otago',
                            'Southland' => 'Southland',
                        )
                ),
                'attributes' => array(
                    'placeholder' => 'Region',
                    'id' => 'regions-NZL'
                )
            ));
            
            $this->add(array(
                'name' => 'regions-USA',
                'type' => 'Zend\Form\Element\Select',
                'options' => array(
                    'label' => 'Region',
                    'empty_option' => 'Please select a region',
                    'value_options' => array(
                            'AL' => 'Alabama',
                            'AK' => 'Alaska',
                            'AZ' => 'Arizona',
                            'AR' => 'Arkansas',
                            'CA' => 'California',
                            'CO' => 'Colorado',
                            'CT' => 'Connecticut',
                            'DE' => 'Delaware',
                            'FL' => 'Florida',
                            'GA' => 'Georgia',
                            'HI' => 'Hawaii',
                            'ID' => 'Idaho',
                            'IL' => 'Illinois',
                            'IN' => 'Indiana',
                            'IA' => 'Iowa',
                            'KS' => 'Kansas',
                            'KY' => 'Kentucky[C]',
                            'LA' => 'Louisiana',
                            'ME' => 'Maine',
                            'MD' => 'Maryland',
                            'MA' => 'Massachusetts[D]',
                            'MI' => 'Michigan',
                            'MN' => 'Minnesota',
                            'MS' => 'Mississippi',
                            'MO' => 'Missouri',
                            'MT' => 'Montana',
                            'NE' => 'Nebraska',
                            'NV' => 'Nevada',
                            'NH' => 'New Hampshire',
                            'NJ' => 'New Jersey',
                            'NM' => 'New Mexico',
                            'NY' => 'New York',
                            'NC' => 'North Carolina',
                            'ND' => 'North Dakota',
                            'OH' => 'Ohio',
                            'OK' => 'Oklahoma',
                            'OR' => 'Oregon',
                            'PA' => 'Pennsylvania[E]',
                            'RI' => 'Rhode Island[F]',
                            'SC' => 'South Carolina',
                            'SD' => 'South Dakota',
                            'TN' => 'Tennessee',
                            'TX' => 'Texas',
                            'UT' => 'Utah',
                            'VT' => 'Vermont',
                            'VA' => 'Virginia[G]',
                            'WA' => 'Washington',
                            'WV' => 'West Virginia',
                            'WI' => 'Wisconsin',
                            'WY' => 'Wyoming',
                        )
                ),
                'attributes' => array(
                    'placeholder' => 'Region',
                    'id' => 'regions-USA'
                )
            ));
            
            
            $this->add(array(
                'name' => 'region',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'region'
                ),
                'attributes' => array(  
                    'class' => 'form-control',
                    'placeholder' => 'Region'
                )
            ));
            
            $this->add(array(
                'name' => 'industry',
                'type' => 'Zend\Form\Element\Select',
                'options' => array(
                    'label' => 'Industry',
                    'empty_option' => 'Please select your industry',
                    'value_options' => array(
                        "Agribusiness/Forestry/Fishing",
                        "Automotive" => "Automotive",
                        "Construction" => "Construction",
                        "Design/Creative" => "Design/Creative",
                        "Education" => "Education",
                        "Electronics" => "Electronics",
                        "Energy" => "Energy",
                        "Entertainment/Leisure" => "Entertainment/Leisure",
                        "Financial Services" => "Financial Services",
                        "FMCG" => "FMCG",
                        "Food/Beverage" => "Food/Beverage",
                        "Franchise" => "Franchise",
                        "Garment/Textile" => "Garment/Textile",
                        "Government/NGO" => "Government/NGO",
                        "Healthcare " => "Healthcare ",
                        "ICT/Computer/Software" => "ICT/Computer/Software",
                        "Import/Export" => "Import/Export",
                        "Industrial/Chemical" => "Industrial/Chemical",
                        "Manufacturing" => "Manufacturing",
                        "Marketing/Media" => "Marketing/Media",
                        "Professional" => "Professional",
                        "Public Utilities" => "Public Utilities",
                        "Real Estate/Property" => "Real Estate/Property",
                        "Retail/Wholesale" => "Retail/Wholesale",
                        "Science/Technology" => "Science/Technology",
                        "Service" => "Service",
                        "Sport/Fitness" => "Sport/Fitness",
                        "Telecommunications" => "Telecommunications",
                        "Trades" => "Trades",
                        "Transportation/Logistics" => "Transportation/Logistics",
                        "Travel/Tourism/Hospitality" => "Travel/Tourism/Hospitality",
                        "Other" => "Other",
                    )
                ),
                'attributes' => array(
                    'placeholder' => 'Industry',
                    'id' => 'industry',
                    'class' => 'form-control',
                )
            ));
            
    }

    /**
     * @return array
     */
    public function getInputFilterSpecification()
    {
        $model = $this->getObject();
        return $model->getValidation();
    }


}

?>