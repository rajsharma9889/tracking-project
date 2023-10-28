function salesPerson() {
    jQuery('#sales_form').validate({
        rules: {
            emp_ids: "required",
            saller_names: "required",
            mother_names: "required",
            father_names: "required",
            id_nos: "required",
            dobs: "required",
            addresss: "required",
            area_assignals: "required",
            reports: "required",
            family_details: "required"
        },
        messages: {
            emp_ids: "<p class='text-danger'>Please Enter Sales Person ID.*</p>",
            saller_names: "<p class='text-danger'>Please Enter Saller name*</p>",
            mother_names: "<p class='text-danger'>Please Enter Mother name*</p>",
            father_names: "<p class='text-danger'>Please Enter Father name*</p>",
            id_nos: "<p class='text-danger'>Please Enter ID No.*</p>",
            dobs: "<p class='text-danger'>Please Enter Date of Birth*</p>",
            addresss: "<p class='text-danger'>Please Enter Address*</p>",
            area_assignals: "<p class='text-danger'>Please Enter  Area Assignal.*</p>",
            reports: "<p class='text-danger'>Please Enter  Report*</p>",
            family_details: "<p class='text-danger'>Please Enter  Family Detail*</p>"
        }
    });

}
jQuery('#form').validate({
    rules: {
        country_name: "required",
        state_name: "required",
        city_name: "required",
        area_name: "required"
    },
    messages: {
        country_name: "<p class='text-danger'>Please Enter  Country Name*</p>",
        state_name: "<p class='text-danger'>Please Enter  State Name*</p>",
        city_name: "<p class='text-danger'>Please Enter  City Name*</p>",
        area_name: "<p class='text-danger'>Please Enter  Area Name*</p>"
    }
});

