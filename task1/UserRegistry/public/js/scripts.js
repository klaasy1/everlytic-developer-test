function deleteUser(id) {
    $('#deleteForm').attr('action','user/'+id+'/delete');
    $("#deleteUser").modal('show');
}

function addUser() {
    $("#addUser").modal('show');
}