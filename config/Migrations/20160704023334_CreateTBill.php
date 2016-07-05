<?php

use Migrations\AbstractMigration;

class CreateTBill extends AbstractMigration
{

    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('t_bill', ['id' => false, 'primary_key' => ['id']]);
        $table->addColumn('id', 'biginteger', [
            'autoIncrement' => true,
            'default' => null,
            'limit' => 20,
            'null' => false,
        ])->addPrimaryKey('id');
        $table->addColumn('pps_id', 'integer', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('customer_id', 'integer', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('customer_code', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('customer_code_main', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('customer_code_sub', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('power_company_code', 'integer', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('power_identification_number', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('supply_div', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('year_code', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('year', 'integer', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('month', 'integer', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('customer_name', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('pdf_name', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('print_datetime', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('bill_price', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('tax', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('minus_price', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('issue_date', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('send_zip_code', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('send_address', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('send_address_name', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('place_zip_code', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('place_address', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('place_name', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('payment_method_code', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('banking_card', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('pay_limit_date', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('receiving_type', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('contract_type', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('contract_electric_main', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('contract_electric_self', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('contract_electric_spare_a', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('contract_electric_spare_b', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('supply_voltage', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('use_date_from', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('use_date_to', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('use_days', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('meter_reading_day', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('next_meter_reading_day', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('use_electric_power', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('max_electric_power', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('total_bill_price', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('base_unit_price_1', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('base_kw_1', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('base_price_1', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('base_power_rate_1', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('base_unit_price_2', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('base_kw_2', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('base_price_2', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('base_power_rate_2', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_name_1', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_unit_price_1', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_kw_1', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_price_1', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_name_2', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_unit_price_2', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_kw_2', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_price_2', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_name_3', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_unit_price_3', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_kw_3', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_price_3', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_name_4', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_unit_price_4', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_kw_4', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_price_4', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_name_5', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_unit_price_5', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_kw_5', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_price_5', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_name_6', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_unit_price_6', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_kw_6', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_price_6', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_name_7', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_unit_price_7', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_kw_7', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_price_7', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_name_8', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_unit_price_8', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_kw_8', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_price_8', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_name_9', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_unit_price_9', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_kw_9', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_price_9', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_name_10', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_unit_price_10', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_kw_10', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('energy_charge_price_10', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('fuel_adjustment_unit_price', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('fuel_adjustment_kw', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('fuel_adjustment_price', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('fuel_adjustment_next_unit_price', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('renewable_energy_levy_unit_price', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('renewable_energy_levy_kw', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('renewable_energy_levy_price', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('preliminary_line_rates_unit_price', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('preliminary_line_rates_kw', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('preliminary_line_rates_price', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('preliminary_power_rates_unit_price', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('preliminary_power_rates_kw', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('preliminary_power_rates_price', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('self_power_base_rates_unit_price', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('self_power_base_rates_kw', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('self_power_base_rates_price', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('self_power_routine_rates_unit_price', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('self_power_routine_rates_kw', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('self_power_routine_rates_price', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('self_power_outside_rates_unit_price', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('self_power_outside_rates_kw', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('self_power_outside_rates_price', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('self_power_fuel_adjustment_unit_price', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('self_power_fuel_adjustment_kw', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('self_power_fuel_adjustment_price', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('self_power_renewable_energy_unit_price', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('self_power_renewable_energy_kw', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('self_power_renewable_energy_price', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_name_1', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_unit_price_1', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_kw_1', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_price_1', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_name_2', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_unit_price_2', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_kw_2', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_price_2', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_name_3', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_unit_price_3', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_kw_3', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_price_3', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_name_4', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_unit_price_4', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_kw_4', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_price_4', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_name_5', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_unit_price_5', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_kw_5', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_price_5', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_name_6', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_unit_price_6', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_kw_6', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_price_6', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_name_7', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_unit_price_7', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_kw_7', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_price_7', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_name_8', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_unit_price_8', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_kw_8', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_price_8', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_name_9', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_unit_price_9', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_kw_9', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_price_9', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_name_10', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_unit_price_10', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_kw_10', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('other_price_price_10', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('before_month_end_meter', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('before_month_end_meter_valid', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('before_month_end_meter_invalid', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('month_end_meter', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('month_end_meter_valid', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('month_end_meter_invalid', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('multiplying_factor', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('old_meter_detaching', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('power_detaching_product_valid', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('power_detaching_product_invalid', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('detaching_meter_multiplying_factor', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('new_meter_detaching', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('power_installed_product_valid', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('power_installed_product_invalid', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('installed_meter_multiplying_factor', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('memo', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('create_user', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modify_user', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('del_flg', 'boolean', [
            'default' => null,
            'null' => false,
        ]);

        $table->addIndex(['pps_id', 'customer_code'], ['name' => 'pps_id']);
        $table->create();
    }

}
