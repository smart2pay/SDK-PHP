<?php

namespace S2P_SDK;

class S2P_SDK_Structure_Payout_Response extends S2P_SDK_Scope_Structure
{
    /**
     * Function should return array with full variable definition
     * @return array
     */
    public function get_definition()
    {
        return array(
            'name' => 'payout',
            'external_name' => 'Payout',
            'type' => S2P_SDK_VTYPE_BLOB,
            'structure' => $this->get_structure_definition(),
        );
    }

    /**
     * Function should return structure definition for blobs or array variables
     * @return array
     */
    public function get_structure_definition()
    {
        $customer_obj = new S2P_SDK_Structure_Customer();
        $address_obj = new S2P_SDK_Structure_Address();
        $status_obj = new S2P_SDK_Structure_Status();

        return array(
            array(
                'name' => 'invalidrequestid',
                'external_name' => 'InvalidRequestID',
                'display_name' => self::s2p_t( 'Payout failure reference ID' ),
                'type' => S2P_SDK_VTYPE_STRING,
                'default' => '',
            ),
            array(
                'name' => 'id',
                'external_name' => 'ID',
                'display_name' => self::s2p_t( 'Payout ID' ),
                'type' => S2P_SDK_VTYPE_INT,
                'default' => 0,
                'regexp' => '^\d{1,12}$',
            ),
            array(
                'name' => 'siteid',
                'external_name' => 'SiteID',
                'display_name' => self::s2p_t( 'Preapproval site ID' ),
                'type' => S2P_SDK_VTYPE_INT,
                'regexp' => '^\d{1,12}$',
                'default' => 0,
            ),
            array(
                'name' => 'created',
                'external_name' => 'Created',
                'display_name' => self::s2p_t( 'Payment creation time' ),
                'type' => S2P_SDK_VTYPE_DATETIME,
                'default' => '',
            ),
            array(
                'name' => 'methodid',
                'external_name' => 'MethodID',
                'type' => S2P_SDK_VTYPE_INT,
                'display_name' => self::s2p_t( 'Payment method ID' ),
                'regexp' => '^\d{1,12}$',
                'default' => 0,
            ),
            array(
                'name' => 'merchanttransactionid',
                'external_name' => 'MerchantTransactionID',
                'display_name' => self::s2p_t( 'Payout merchant assigned transaction ID' ),
                'type' => S2P_SDK_VTYPE_STRING,
                'default' => '',
                'regexp' => '^[0-9a-zA-Z_-]{1,50}$',
            ),
            array(
                'name' => 'originatortransactionid',
                'external_name' => 'OriginatorTransactionID',
                'display_name' => self::s2p_t( 'A number that uniquely identifies the transaction in the original requester\'s system' ),
                'type' => S2P_SDK_VTYPE_STRING,
                'default' => '',
                'regexp' => '^[0-9a-zA-Z_-]{1,50}$',
            ),
            array(
                'name' => 'amount',
                'external_name' => 'Amount',
                'display_name' => self::s2p_t( 'Payout amount' ),
                'type' => S2P_SDK_VTYPE_INT,
                'default' => 0,
                'regexp' => '^\d{1,12}$',
            ),
            array(
                'name' => 'currency',
                'external_name' => 'Currency',
                'display_name' => self::s2p_t( 'Payout currency' ),
                'type' => S2P_SDK_VTYPE_STRING,
                'default' => null,
                'regexp' => '^[A-Z]{3}$',
                'value_source' => S2P_SDK_Values_Source::TYPE_CURRENCY,
            ),
            array(
                'name' => 'description',
                'external_name' => 'Description',
                'display_name' => self::s2p_t( 'Payout description' ),
                'type' => S2P_SDK_VTYPE_STRING,
                'regexp' => '^.{1,255}$',
            ),
            array(
                'name' => 'statementdescriptor',
                'external_name' => 'StatementDescriptor',
                'display_name' => self::s2p_t( 'Payout statement description' ),
                'type' => S2P_SDK_VTYPE_STRING,
                'regexp' => '^.{1,255}$',
            ),
            array(
                'name' => 'status',
                'external_name' => 'Status',
                'display_name' => self::s2p_t( 'Preapproval ID' ),
                'type' => S2P_SDK_VTYPE_BLOB,
                'default' => null,
                'structure' => $status_obj->get_structure_definition(),
            ),
            array(
                'name' => 'customer',
                'external_name' => 'Customer',
                'type' => S2P_SDK_VTYPE_BLOB,
                'default' => null,
                'structure' => $customer_obj->get_structure_definition(),
            ),
            array(
                'name' => 'billingaddress',
                'external_name' => 'BillingAddress',
                'type' => S2P_SDK_VTYPE_BLOB,
                'default' => null,
                'structure' => $address_obj->get_structure_definition(),
            ),
            array(
                'name' => 'details',
                'external_name' => 'Details',
                'type' => S2P_SDK_VTYPE_BLARRAY,
                'default' => null,
                'structure' => array(
                    array(
                        'name' => 'customeriban',
                        'external_name' => 'CustomerIBAN',
                        'display_name' => self::s2p_t( 'Customer IBAN' ),
                        'type' => S2P_SDK_VTYPE_STRING,
                        'default' => '',
                    ),
                    array(
                        'name' => 'customerbankaccountid',
                        'external_name' => 'CustomerBankAccountID',
                        'display_name' => self::s2p_t( 'Customer bank account id' ),
                        'type' => S2P_SDK_VTYPE_STRING,
                        'default' => '',
                    ),
                    array(
                        'name' => 'cryptoaddress',
                        'external_name' => 'CryptoAddress',
                        'display_name' => self::s2p_t( 'Address when paying with crypto' ),
                        'type' => S2P_SDK_VTYPE_STRING,
                        'default' => '',
                        'regexp' => '^.{1,50}$',
                    ),
                    array(
                        'name' => 'cryptocurrency',
                        'external_name' => 'CryptoCurrency',
                        'display_name' => self::s2p_t( 'Crypto currency' ),
                        'type' => S2P_SDK_VTYPE_STRING,
                        'default' => null,
                        'regexp' => '^[A-Z]{3}$',
                        'value_source' => S2P_SDK_Values_Source::TYPE_CURRENCY,
                    ),
                    array(
                        'name' => 'Securityquestion',
                        'external_name' => 'SecurityQuestion',
                        'display_name' => self::s2p_t( 'Security question' ),
                        'type' => S2P_SDK_VTYPE_STRING,
                        'default' => '',
                        'regexp' => '^.{6,40}$',
                    ),
                    array(
                        'name' => 'securityanswer',
                        'external_name' => 'SecurityAnswer',
                        'display_name' => self::s2p_t( 'Security answer' ),
                        'type' => S2P_SDK_VTYPE_STRING,
                        'default' => '',
                        'regexp' => '^.{6,25}$',
                    ),
                    array(
                        'name' => 'ipaddress',
                        'external_name' => 'IPAddress',
                        'display_name' => self::s2p_t( 'IP Address' ),
                        'type' => S2P_SDK_VTYPE_STRING,
                        'default' => '',
                        'regexp' => '^.{1,45}$',
                    ),
                )
            ),
        );
    }

}
