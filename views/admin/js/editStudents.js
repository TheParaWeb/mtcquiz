$(function () {

    $('#edit-student-select').change(function(){
        var id = $(this).val();
        if(id == "null"){
            $('#name').val("");
            $('#email').val("");
            $('#age').val("");
            $('#sex').val("");

            return false;
        }

        $.post('../xhrGetStudent',
            {id: id},
            function (student) {
                console.log(student.email);
                $('#name').val(student.name);
                $('#email').val(student.email);
                $('#age').val(student.age);
                $('#sex').val(student.gender);
                var href = $('#deleteStudentButton').attr('href')+id+"/";
                $('#deleteStudentButton').attr('href',href);
            }, 'json');
    });

    $('#deleteStudentButton').click(function(){
        var retVal = confirm("WARNING! Deleting a student will also delete their test results. Continue?");
        if( retVal == true ){
            alert("Student Deleted!");
            return true;
        }else{
            return false;
        }
    });

});