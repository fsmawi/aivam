$(document).ready(function() {
    $('.checkboxes-years').click(function(event) {  //on click
        var val = $(this).val();
        if(this.checked) { // check select status
            $('.checkboxes-'+val).each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"
            });
        }else{
            console.log('uncheck');
            $('.checkboxes-'+val).each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"
            });
        }
    });

    $('.newitem').click(function(event) {
        var item = $(this).data('item');
        $(this).find('span.glyphicon').addClass('active');
        addItem(item, $('#form_'+item).val());
    });

    $('.finditem').click(function(event) {
        var item = $(this).data('item');
        $('.modal-title').html(item);
        getItems(item, function(item, data){
            $('.modal-body').html('');
            $.each(data, function (i, val) {
                $("<p>"+val.title+"</p>").appendTo('.modal-body');
            });
            $('#item_modal').modal('show');
            $('.modal-body p').click(function(event) {
                $('#form_'+item).val($(this).html());
            });
        });
    });


    $('.input-control').click(function (){
        var $this = $(this);
        $this.toggleClass('glyphicon-plus').toggleClass('glyphicon-minus');
        var form_item = $this.siblings('label').attr('for');

        //toggle actions
        $this.parent().siblings('.check-context').toggle();

        $('#'+form_item).toggle();
        if($this.has('glyphicon-minus')) {
            $('#'+form_item).val('');
        }
    });

    // $.each(ITEM_MAPPING, function (key, value) {
    //     var input_item = $('#form_'+key);
    //     input_item.hide();
    //     input_item.parent().siblings('.check-context').hide();
    // });
});

CUSTOM_FIELD = {
    'premium_segment':'body_type:segment:make:model',
    'model':'body_type:segment:make:premium_segment',
    'make':'body_type:segment:model:premium_segment',
    'segment': 'body_type:make:model:premium_segment',
    'body_type':'segment:make:model:premium_segment',
    'premium_segment2':'body_type2:segment2:make2:model2',
    'model2':'body_type2:segment2:make2:premium_segment2',
    'make2':'body_type2:segment2:model2:premium_segment2',
    'segment2': 'body_type2:make2:model2:premium_segment2',
    'body_type2':'segment2:make2:model2:premium_segment2'
};

ITEM_MAPPING = {
    'year':'year',
    'month':'month',
    'displacement':'displacement',
    'sales':'sales',
    'rsp':'rsp',
    'price_class':'price_class',
    'city':'citie',
    'group':'group',
    'make':'make',
    'premium_segment':'premium_segment',
    'model_gnr':'model_gnr',
    'model':'model',
    'engine_type':'carburation',
    'type':'caracteristique',
    'ckd_cbu':'ckd_cbu',
    'pc_cv':'pc_cv',
    'segment':'segment',
    'body_type':'body_type',
    'origine':'origine',
    'year2':'year',
    'month2':'month',
    'displacement2':'displacement',
    'sales2':'sales',
    'rsp2':'rsp',
    'price_class2':'price_class',
    'city2':'citie',
    'group2':'group',
    'make2':'make',
    'premium_segment2':'premium_segment',
    'model_gnr2':'model_gnr',
    'model2':'model',
    'engine_type2':'carburation',
    'type2':'caracteristique',
    'ckd_cbu2':'ckd_cbu',
    'pc_cv2':'pc_cv',
    'segment2':'segment',
    'body_type2':'body_type',
    'origine2':'origine'
};

function addItem(model, value) {

    url = "/admin/rest/"+ITEM_MAPPING[model]+"s/"+ITEM_MAPPING[model]+".json";
    $.ajax({
            url: url,
            data: 'title=' + value,
            type: 'POST',
            success: function(data) {
                if (data) {
                    if(data.count) {
                        alert('Cette valeur existe déjà dans la base de données !');
                    }
                }
            }
        });
}

function getItems(model, callback) {

    url = '/admin/rest/'+ITEM_MAPPING[model]+'s/list.json';

    console.log(model, url);

    if(CUSTOM_FIELD[model] != undefined) {
        url += "?";
        var custom_field = CUSTOM_FIELD[model];
        var temp = custom_field.split(":");

        console.log(custom_field, temp);

        for(var i=0; i < temp.length; i++) {
            if($('#form_'+ temp[i]).length && $('#form_'+ temp[i]).val() != "") {
                url += ITEM_MAPPING[temp[i]] + "=" + $('#form_'+ temp[i]).val() + "&";
            }
        }
    }

    $.ajax({
            url: url,
            type: 'GET',
            success: function(data) {
                if (data) {
                    callback(model, data);
                }
            }
        });
}

function test(model, data) {
    console.log(model, data);
}

