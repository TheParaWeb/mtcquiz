$(function () {

    $('#create').click(function(){

        if($('.new-category').is(':visible')){
            $('#create').html('+Add New Category');
            $('.new-category').hide();
        }else{
            $('#create').html('+Close Window');
            $('.new-category').show();
        }

    });

    $('.delete').click(function(){
        var retVal = confirm("WARNING! Deleting a category will also delete all jobs associated with that category. Are you sure you want to continue? ");
        if( retVal == true ){
            return true;
        }else{
            return false;
        }
    });

    $('.unauthorized').click(function(){
        alert("You don't have permission to do this! Please contact the system administrator");
        return false;
    });


    $('#edit-job-select').change(function(){
       var jobId = $(this).val();

        $.post('../xhrGetJob',
            {id: jobId},
            function (job) {
                $('#edit-jobTitle').val(job.jobTitle);
                $('#edit-salary').val(job.salary);
                $('#edit-description').html(job.description);

                var action = $("#updateJobForm").attr('action')+job.id+"/";
                var href = $('#deleteJob').attr('href')+job.id+"/";
                $("#updateJobForm").attr('action',action);
                $('#deleteJob').attr('href',href);
            }, 'json');
    });

    $('#updateJob').click(function(){
        alert('Job Updated!');
    });

    $('#createJob').click(function(){
        alert('Job Created!');
    });

    $('#deleteJob').click(function(){
        var retVal = confirm("Are you sure you want to delete this job?");
        if( retVal == true ){
            alert("Job Deleted!");
            return true;
        }else{
            return false;
        }
    });
});