$(document).ready(function () {
    $('[data-plugin="switchery"]').each(function(e, a) {
        new Switchery(a, $(a).data())
    });
    let previewImage = document.querySelector('.card .preview');
    if(previewImage)
        previewImage.onchange = function (e) {
            const [file] = previewImage.files
            if (file) {
                this.parentNode.parentNode.querySelector('img').src = URL.createObjectURL(file)
            }
        }

    let needToRemoveIds = [];
    $('.remove_check').on('change', function (e) {
        let idsCollection = '';
        let id = $(this).attr('name');
        // if($(this).prop('checked'));
        if($(this).prop('checked')){
            needToRemoveIds[id] = id;
        }else{
            needToRemoveIds[id] = false;
        }
        needToRemoveIds.forEach(function (v,i,a) {
            if(v){
                idsCollection += v + ',';
            }
        })
       $('#deleted_ids').val(idsCollection);
    })
})