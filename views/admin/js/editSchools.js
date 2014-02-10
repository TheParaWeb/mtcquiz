$(function () {
    $('.deactivate').click(function(){
        var retVal = confirm("Deactivating this district will also deactivate all schools within this district. Continue?");
        if( retVal == true ){
            return true;
        }else{
            return false;
        }
    });

    $('.activateDistrict').click(function(){
        $('#activateDistrict').hide();
        $('#deactivateDistricts').show();
    });

    $('.deactivateDistricts').click(function(){
        $('#deactivateDistricts').hide();
        $('#activateDistrict').show();
    });


    $('#edit-school-select').change(function(){
        var name = $(this).val();

        if(name == "null"){
            $('#active').prop('checked', false);
            $('#schoolName').val("");
            $('#contactName').val("");
            $('#contactEmail').val("");
            return false;
        }

        $.post('../xhrGetSchool',
            {name: name},
            function (school) {
                console.log(school);

                if(school.active ==1){
                    $('#active').prop('checked', true);
                }else{
                    $('#active').prop('checked', false);
                }

                $('#schoolName').val(school.name);
                $('#contactName').val(school.contact_name);
                $('#contactEmail').val(school.contact_email);

                var href = $('#deleteSchoolButton').attr('href')+school.id+"/";
                $('#deleteSchoolButton').attr('href',href);
            }, 'json');
    });

    $('#deleteSchoolButton').click(function(){
        var retVal = confirm("Are you sure you want to delete this school?");
        if( retVal == true ){
            alert("School Deleted!");
            return true;
        }else{
            return false;
        }
    });

});