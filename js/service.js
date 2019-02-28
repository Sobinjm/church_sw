 $(document).ready(function() {
// document.addEventListener('contextmenu', event => event.preventDefault());

     var iCnt = 0;
     // var container = $(document.createElement('tr'));
     $('#btAdd').click(function() {
         if (iCnt <= 19) {

             iCnt = iCnt + 1;

             // ADD TEXTBOX.
             // $('#tbody').append('<tr><td><input type=text class="input" id=tb' + iCnt + ' ' +
             // 'value="Text Element ' + iCnt + '" /></td></tr>');


             $('#tbody').append('<tr id="row-' + iCnt + '"><td>' + (iCnt + 1) + '</td>' +
                 '<td>'+
                    '<div class="form-group">'+
                        '<select class="form-select"  name="sir_name[]">'+
                            '<option value="Mr">Mr.</option>'+
                            '<option value="Mrs">Mrs.</option>'+
                            '<option value="Miss">Miss</option>'+
                            
                        '</select>'+
                   ' </div>'+
               ' </td>'+
               ' <td>'+
                    '<div class="form-group">'+
                        '<input class="form-input" id="ini0" type="text" name="ini[]"placeholder="Initial">'+
                   ' </div>'+
                '</td>'+
                 '<td>' +
                 '<div class="form-group">' +
                 '<input class="form-input"  id="head' + iCnt + '"  type="text" placeholder="Name" name="e_name[]"/>' +
                 '</div>' +
                 '</td>' +
                 '<td>' +
                 '<div class="form-group">' +
                 '<input class="form-input  password-opener password tamil" id="t_name' + iCnt + '"  type="text"  placeholder="bgau;" name="t_name[]"/>' +
                 '</div>' +
                 '</td>' +
                 '<td>' +
                 '<div class="form-group">' +
                 '<input class="form-input" placeholder="Date of birth" type="date" name="dob[]"/>' +
                 '</div>' +
                 '</td>' +
                 '<td>' +
                 '<div class="form-group">' +
                 '<input class="form-input" placeholder="Date of baptism" type="date" name="dobp[]"/>' +
                 '</div></td>' +
                 '<td>' +
                 '<div class="form-group">' +
                 '<label class="form-radio form-inline">' +
                 '<input type="radio" name="head" value="H' + iCnt + '" class="head" data-id="head' + iCnt + '" ><i class="form-icon"></i> Head' +
                 '</label>' +
                 '</div>' +
                 '</td>' +
                 '<td>' +
                 '<div class="form-group"><select class="form-input"  name="relation[]">' +
                 '<option value="W/o">W/o</option>' +
                 '<option value="S/o">S/o</option>' +
                 '<option value="D/o">D/o</option>' +
                 '<option value="H/o">H/o</option>' +
                 '</select></div>' +
                 '</td>' +
                 '<td>' +
                 '<div class="form-group">' +
                 '<label class="form-radio form-inline">' +
                 '<input type="radio" name="sex[' + iCnt + ']" value="Male" checked=""><i class="form-icon"></i> Male' +
                 '</label>' +
                 '<label class="form-radio form-inline">' +
                 '<input type="radio" name="sex[' + iCnt + ']" value="Female"><i class="form-icon"></i> Female' +
                 '</label>' +
                 '</div>' +
                 '</td>' +
                 '<td>' +
                 '<div class="form-group">' +
                 '<input class="form-input"  type="file" name="m_photo[]" >' +
                 '</div>' +
                 '</td>' +
                 '<td>' +
                 '<div class="form-group">  ' +
                 '<label class="form-checkbox form-inline" >' +
                 '<input type="radio" name="sts[' + iCnt + ']" value="late" ><i class="form-icon"></i> Late  ' +
                 '</label>' +
                 '<label class="form-checkbox form-inline" style="display: none;">' +
                 '<input type="radio" name="sts[' + iCnt + ']" value="1" checked="checked"><i class="form-icon"></i> Live ' +
                 '</label>' +
                 '</div>' +
                 '</td>' +
                 '</tr>');

         }
         // AFTER REACHING THE SPECIFIED LIMIT, DISABLE THE "ADD" BUTTON.
         // (20 IS THE LIMIT WE HAVE SET)
         else {
             style = "visibility: hidden;"
             $(container).append('<label>Reached the limit</label>');
             $('#btAdd').attr('class', 'bt-disable');
             $('#btAdd').attr('disabled', 'disabled');
         }
     });
 /*==================Add porul kaanikai ==========================*/

     var aCnt = 0;
     // var container = $(document.createElement('tr'));
     $('#btAdd-porul').click(function() {
        // alert();
         if (aCnt <= 8) {

             aCnt = aCnt + 1;

             // ADD TEXTBOX.
             // $('#tbody').append('<tr><td><input type=text class="input" id=tb' + iCnt + ' ' +
             // 'value="Text Element ' + iCnt + '" /></td></tr>');


             $('#pourl_panel').prepend('<div class="columns" >'+
'<div class="form-group column  col-3 ">'+
  '<select class="form-select chosen " id="item" name="item">'+
    '<option>Item 1</option>'+
    '<option>Item 1</option>'+
    '<option>Item 1</option>'+
    '<option>Item 1</option>'+
    '<option>Item 1</option>'+
    '<option>Item 1</option>'+
    '<option>Item 1</option>'+
    '<option>Item 1</option>'+
  '</select>'+
'</div>'+
'<div class="form-group column  col-3 ">'+
  '<input class="form-input clear" type="number" id="item_count[]" placeholder="Count">'+
'</div>'+
'<div class="form-group column  col-3 ">'+
  '<input class="form-input clear" type="number" id="item_amt[]" placeholder="Bid Amount">'+
'</div>'+
'<div class="form-group column  col-3 ">'+
 '<select class="form-select chosen tamil" id="f_id" name="family_head">'+
         '<option value="0">Select Family</option>'+
       ' '+
      '</select>'+
'</div>'+

'</div>');

         }
         // AFTER REACHING THE SPECIFIED LIMIT, DISABLE THE "ADD" BUTTON.
         // (20 IS THE LIMIT WE HAVE SET)
         else {
             // $(container).append('<label>Reached the limit</label>');
             // $('#btAdd').attr('class', 'bt-disable');
             // $('#btAdd').attr('disabled', 'disabled');
         }
     });
     /*==================End of add porul kaanikai====================*/
     /*==================Add extra place ==========================*/

     var aCnt = 0;
     // var container = $(document.createElement('tr'));
     $('#btAdd-place').click(function() {
         if (aCnt <= 19) {

             aCnt = aCnt + 1;

             // ADD TEXTBOX.
             // $('#tbody').append('<tr><td><input type=text class="input" id=tb' + iCnt + ' ' +
             // 'value="Text Element ' + iCnt + '" /></td></tr>');


             $('#tbody-place').append('<tr id="row-' + aCnt + '"><td>' + (aCnt + 1) + '</td>' +
                 '<td>' +
                 '<div class="form-group">' +
                 '<input class="form-input"    type="text" placeholder="Name" name="e_name[]"/>' +
                 '</div>' +
                 '</td>' +
                 '<td>' +
                 '<div class="form-group">' +
                 '<input class="form-input password-opener password tamil"   type="text"  placeholder="bgau;" name="t_name[]"/>' +
                 '</div>' +
                 '</td>' +

                 '</tr>');

         }
         // AFTER REACHING THE SPECIFIED LIMIT, DISABLE THE "ADD" BUTTON.
         // (20 IS THE LIMIT WE HAVE SET)
         else {
             $(container).append('<label>Reached the limit</label>');
             $('#btAdd').attr('class', 'bt-disable');
             $('#btAdd').attr('disabled', 'disabled');
         }
     });
     /*==================End of add extra place====================*/
     /*==================Add extra category ==========================*/

     var aCnt = 0;
     // var container = $(document.createElement('tr'));
     $('#btAdd-cat').click(function() {
         if (aCnt <= 19) {

             aCnt = aCnt + 1;

             // ADD TEXTBOX.
             // $('#tbody').append('<tr><td><input type=text class="input" id=tb' + iCnt + ' ' +
             // 'value="Text Element ' + iCnt + '" /></td></tr>');


             $('#tbody-cat').append('<tr id="row-' + aCnt + '"><td>' + (aCnt + 1) + '</td>' +
                 '<td>' +
                 '<div class="form-group">' +
                 '<input class="form-input"    type="text" placeholder="Category Name" name="e_name[]"/>' +
                 '</div>' +
                 '</td>' +
                 '<td>' +
                 '<div class="form-group">' +
                 '<input class="form-input password-opener password tamil"   type="text"  placeholder="bgau;" name="t_name[]"/>' +
                 '</div>' +
                 '</td>' +
                 '<td>' +
                 '<div class="form-group">' +
                 '<input class="form-input"   type="text"  placeholder="Description" name="desc[]"/>' +
                 '</div>' +
                 '</td>' +
                 '<td>' +
                 '<div class="form-group">' +
                 '<input class="form-input"   type="text"  placeholder="Frequency" name="freq[]"/>' +
                 '</div>' +
                 '</td>' +
                 '<td>' +
                 '<div class="form-group">' +
                 '<select name="cat_type[]">' +
                 '<option value="Income">Income</option>' +
                 '<option value="Expence">Expence</option>' +
                 '</select>' +
                 '</div>' +
                 '</td>' +

                 '</tr>');

         }
         // AFTER REACHING THE SPECIFIED LIMIT, DISABLE THE "ADD" BUTTON.
         // (20 IS THE LIMIT WE HAVE SET)
         else {
             $(container).append('<label>Reached the limit</label>');
             $('#btAdd').attr('class', 'bt-disable');
             $('#btAdd').attr('disabled', 'disabled');
         }
     });
     /*==================End of add extra category====================*
     /*=======================Selecting  Family Head ===================================> */
     $('.head').click(function() {
         var id = $(this).attr('data-id');
         var head = $('#' + id).val();
         $('#family_head').val(head);
         // alert(head);

     });


     /*======================== end of Selecting  Family Head  ===========================================*/
     $('#input-barcode').change(function() {
	 $('#input-barcode').hide();
         $('#loader').show();
         // alert();
         var id1 = $(this).val();

         var input_date = $('#input-date').val();
         var cat = $('#cat').val();
         var f_id = $('#f_id').val();
         $('#input-barcode').val('');
         //alert(id1);
         $.ajax({
             type: "GET",
             url: "controls/populate-family.php",
             data: { id: id1 },
             dataType: "json",
             success: function(data) {
                 //$("#div1").html(result);
                 //alert(data);
                 
                 $('#member_list').html('');
                 $('#family_id_title').html(data['family_id']);
                 $('#family_place_title').html(data['place']);
                 $('#family_id').val(data['family_id']);
                 $('#family_id2').val(data['family_id']);
                 $('#receipt_no').html(data['receipt'] + 1);
                 for (var i = data['member'].length - 1; i >= 0; i--) {
 //alert(data['member_id']+data['member'][i].id);
                     if (data['member_id'] == data['member'][i].id) {
                         var check = ' checked="" ';
                         var mem = 1;
                         $('#member_id').val(data['member'][i].id );
                         $('#family_head_title').html(data['member'][i].name + '  <a href="edit_family.php?id=' + data['family_id'] + '"<i class="ml-2 icon icon-edit"></i>');
                         // alert();
                     } else if ((data['member'][i].member_type == 1) && mem != 1) {
                        // alert();
                         $('#member_id').val(data['member'][i].id);
                         var check = ' checked="" ';
                         $('#family_head_title').html(data['member'][i].name + '  <a href="edit_family.php?id=' + data['family_id'] + '"<i class="ml-2 icon icon-edit"></i>');
                     } else {
                         if (data['member'][i].member_type == 1) {
                             if(check!='')
                             {
                                 var check = ' checked="" ';
                             }
                             else{
                                check='';
                             }
                             // alert(data['member_id']+data['member'][i].id);
                             // $('#family_head_title').html(data['member'][i].name + '  <a href="contrls/edit_family.php?id=' + data['family_id'] + '"<i class="ml-2 icon icon-edit"></i>');
                             // $('#member_id').val(data['member'][i].id);

                         } else {
                             var check = '';
                         }
                     }

                     $('#member_list').prepend('<div class="tile tile-centered mt-2 ">' +
                         '<div class="tile-content ">' +
                         '<div class="tile-title text-bold ">' +
                         '<div class="form-group ">' +
                         '<label class="form-radio form-inline ">' +
                         '<input type="radio" class="change_member" value="'+data['member'][i].id+'" name="member" ' + check + '><i class="form-icon"></i> ' + data['member'][i].name +
                         '</label>' +
                         '</div>' +
                         '</div>' +

                         '</div>' +

                         '</div>');
                     check='';
                     if (data['cat'] == '6') {
                         $('#porul_panel-out').hide();
                         $('.receipt_panel').css('display', 'none');
                         $('#bday_panel').show();
                         $('#category_id').val(data['cat']);
                         $('member_id').val(data['member_id']);
                     } else if (data['cat'] == '0') {
                         $('#porul_panel-out').css('visibility', 'hidden');
                         $('.receipt_panel').css('display', 'none');
                         $('#default_panel').show();
                         $('#monthly_amt').focus();
                         $('#category_id').val(data['cat']);
                     }  else if (data['cat'] == '25') {
                        // alert(data['cat']);
                        $('#porul_panel-out').show();
                         $('.receipt_panel').css('display', 'none');
                         $('#porul_panel-out').css('visibility', 'visible');
                         $('#category_id').val(data['cat']);
                     }else {
                         $('#porul_panel-out').hide();
                         $('.receipt_panel').css('display', 'none');
                         $('#common_panel').show();
                         $('#common_amt').focus();
                         $('#category_id').val(data['cat']);
                     }
                 }
                 // alert(JSON.stringify(data));
                 // alert(data['member'].[0].name);

             },
             error: function(errorThrown) {
                 alert(JSON.stringify(errorThrown));
             }
         });
         // alert(input_date+'------'+cat+'-------'+f_id);
     });



$(document).on('click','.change_member', function()
    {
        var mem_id=$(this).val();
        // alert(mem_id);
        $('#member_id').val(mem_id);
    });
//=================Manual Receipt ==========================//
$('#cat').change(function(){
    var vcat=$(this).val();
    if(vcat==6 || vcat==22 ||  vcat==31 || vcat==48 || vcat==53)
    {
        $('#f_id').prop('selectedIndex',0);
        $('#f_id').trigger("chosen:updated");
        // $('#f_id').hide();
        $('#f_id_chosen').hide();
        // $('#m_id').show();
        $('#m_id_chosen').show();
        $('#m_id').prop('selectedIndex',0);
        $('#m_id').trigger("chosen:updated");
    }
    else
    {
        $('#f_id').prop('selectedIndex',0);
        $('#f_id').trigger("chosen:updated");
        // $('#f_id').show();
        $('#f_id_chosen').show();
        $('#m_id').prop('selectedIndex',0);
        $('#m_id').trigger("chosen:updated");
        $('#m_id_chosen').hide();
    }

    
    // $('#f_id')
});
 $('#f_id').change(function() {
         $('#loader').show();
         // alert();
         var fid = $(this).val();
         var cid = $('#cat').val();
         var id1 = fid+'-'+cid;

         var input_date = $('#input-date').val();
         var cat = $('#cat').val();
         var f_id = $('#f_id').val();
         $('#input-barcode').val('');
         //alert(id1);
         $.ajax({
             type: "GET",
             url: "controls/populate-family.php",
             data: { id: id1 },
             dataType: "json",
             success: function(data) {
                 //$("#div1").html(result);
                 // alert(JSON.stringify(data));
                 $('#member_list').html('');
                 $('#family_id_title').html(data['family_id']);
                 $('#family_place_title').html(data['place']);
                 $('#family_id').val(data['family_id']);
                 $('#family_id2').val(data['family_id']);
                 $('#receipt_no').html(data['receipt'] + 1);
                 for (var i = data['member'].length - 1; i >= 0; i--) {

                     if (data['member_id'] == data['member'][i].id) {
                         var check = ' checked="" ';
                         var mem = 1;
                         $('#member_id').val(data['member'][i].id );
                         $('#member_id2').val(data['member'][i].id );
                         $('#family_head_title').html(data['member'][i].name + '  <a href="edit_family.php?id=' + data['family_id'] + '"<i class="ml-2 icon icon-edit"></i>');
                         // alert();
                     } else if ((data['member'][i].member_type == 1) && mem != 1) {
                        // alert();
                         $('#member_id').val(data['member'][i].id);
                         $('#member_id2').val(data['member'][i].id );
                         var check = ' checked="" ';
                         $('#family_head_title').html(data['member'][i].name + '  <a href="edit_family.php?id=' + data['family_id'] + '"<i class="ml-2 icon icon-edit"></i>');
                     } else {
                         if (data['member'][i].member_type == 1) {
                             if(check!='')
                             {
                                 var check = ' checked="" ';
                             }
                             else{
                                check='';
                             }
                             // alert(data['member_id']+data['member'][i].id);
                             // $('#family_head_title').html(data['member'][i].name + '  <a href="contrls/edit_family.php?id=' + data['family_id'] + '"<i class="ml-2 icon icon-edit"></i>');
                             // $('#member_id').val(data['member'][i].id);

                         } else {
                             var check = '';
                         }
                     }

                     $('#member_list').prepend('<div class="tile tile-centered mt-2 ">' +
                         '<div class="tile-content ">' +
                         '<div class="tile-title text-bold ">' +
                         '<div class="form-group ">' +
                         '<label class="form-radio form-inline ">' +
                         '<input class="change_member" value="'+data['member'][i].id+'"  type="radio" name="member" ' + check + '><i class="form-icon"></i> ' + data['member'][i].name +
                         '</label>' +
                         '</div>' +
                         '</div>' +

                         '</div>' +

                         '</div>');
                     check='';
                     if (data['cat'] == '6') {
                         $('#porul_panel-out').hide();
                         $('.receipt_panel').css('display', 'none');
                         $('#bday_panel').show();
                         $('#category_id').val(data['cat']);
                         $('member_id').val(data['member_id']);
                     } else if (data['cat'] == '0') {
                         $('#porul_panel-out').css('visibility', 'hidden');
                         $('.receipt_panel').css('display', 'none');
                         $('#default_panel').show();
                         $('#category_id').val(data['cat']);
                     }  else if (data['cat'] == '25') {
                        // alert(data['cat']);
                        $('#porul2_panel-out').hide();
                        $('#porul_panel-out').show();
                         $('.receipt_panel').css('display', 'none');
                         $('#porul_panel-out').css('visibility', 'visible');
                         $('#category_id').val(data['cat']);
                     }else if(data['cat'] == '39')
                     {
                        $('#porul_panel-out').hide();
                        $('#porul2_panel-out').show();
                         $('.receipt_panel').css('display', 'none');
                         $('#porul2_panel-out').css('visibility', 'visible');
                         $('#category_id2').val(data['cat']);
                     }else {
                         $('#porul_panel-out').hide();
                         $('.receipt_panel').css('display', 'none');
                         $('#common_panel').show();
                         $('#category_id').val(data['cat']);
                     }
                 }
                 // alert(JSON.stringify(data));
                 // alert(data['member'].[0].name);

             },
             error: function(errorThrown) {
                 alert(JSON.stringify(errorThrown));
             }
         });
         // alert(input_date+'------'+cat+'-------'+f_id);
     });

$('#m_id').change(function() {
         $('#loader').show();
         // alert();
         var fid = $(this).val();
         var cid = $('#cat').val();
         var id1 = fid+'-'+cid;

         var input_date = $('#input-date').val();
         var cat = $('#cat').val();
         var f_id = $('#f_id').val();
         $('#input-barcode').val('');
         //alert(id1);
         $.ajax({
             type: "GET",
             url: "controls/populate-family.php",
             data: { id: id1, m_id:fid },
             dataType: "json",
             success: function(data) {
                 //$("#div1").html(result);
                 // alert(JSON.stringify(data));
                 $('#member_list').html('');
                 $('#family_id_title').html(data['family_id']);
                 $('#family_place_title').html(data['place']);
                 $('#family_id').val(data['family_id']);
                 $('#family_id2').val(data['family_id']);
                 $('#receipt_no').html(data['receipt'] + 1);
                 for (var i = data['member'].length - 1; i >= 0; i--) {

                     if (data['member_id'] == data['member'][i].id) {
                         var check = ' checked="" ';
                         var mem = 1;
                         $('#member_id').val(data['member'][i].id );
                         $('#member_id2').val(data['member'][i].id );
                         $('#family_head_title').html(data['member'][i].name + '  <a href="edit_family.php?id=' + data['family_id'] + '"<i class="ml-2 icon icon-edit"></i>');
                         // alert();
                     } else if ((data['member'][i].member_type == 1) && mem != 1) {
                        // alert();
                         $('#member_id').val(data['member'][i].id);
                         $('#member_id2').val(data['member'][i].id );
                         var check = ' checked="" ';
                         $('#family_head_title').html(data['member'][i].name + '  <a href="edit_family.php?id=' + data['family_id'] + '"<i class="ml-2 icon icon-edit"></i>');
                     } else {
                         if (data['member'][i].member_type == 1) {
                             if(check!='')
                             {
                                 var check = ' checked="" ';
                             }
                             else{
                                check='';
                             }
                             // alert(data['member_id']+data['member'][i].id);
                             // $('#family_head_title').html(data['member'][i].name + '  <a href="contrls/edit_family.php?id=' + data['family_id'] + '"<i class="ml-2 icon icon-edit"></i>');
                             // $('#member_id').val(data['member'][i].id);

                         } else {
                             var check = '';
                         }
                     }

                     $('#member_list').prepend('<div class="tile tile-centered mt-2 ">' +
                         '<div class="tile-content ">' +
                         '<div class="tile-title text-bold ">' +
                         '<div class="form-group ">' +
                         '<label class="form-radio form-inline ">' +
                         '<input class="change_member" value="'+data['member'][i].id+'"  type="radio" name="member" ' + check + '><i class="form-icon"></i> ' + data['member'][i].name +
                         '</label>' +
                         '</div>' +
                         '</div>' +

                         '</div>' +

                         '</div>');
                     check='';
                     if (data['cat'] == '6') {
                         $('#porul_panel-out').hide();
                         $('.receipt_panel').css('display', 'none');
                         $('#bday_panel').show();
                         $('#category_id').val(data['cat']);
                         $('member_id').val(data['member_id']);
                     } else if (data['cat'] == '0') {
                         $('#porul_panel-out').css('visibility', 'hidden');
                         $('.receipt_panel').css('display', 'none');
                         $('#default_panel').show();
                         $('#category_id').val(data['cat']);
                     }  else if (data['cat'] == '25') {
                        // alert(data['cat']);
                        $('#porul2_panel-out').hide();
                        $('#porul_panel-out').show();
                         $('.receipt_panel').css('display', 'none');
                         $('#porul_panel-out').css('visibility', 'visible');
                         $('#category_id').val(data['cat']);
                     }else if(data['cat'] == '39')
                     {
                        $('#porul_panel-out').hide();
                        $('#porul2_panel-out').show();
                         $('.receipt_panel').css('display', 'none');
                         $('#porul2_panel-out').css('visibility', 'visible');
                         $('#category_id2').val(data['cat']);
                     }else {
                         $('#porul_panel-out').hide();
                         $('.receipt_panel').css('display', 'none');
                         $('#common_panel').show();
                         $('#category_id').val(data['cat']);
                     }
                 }
                 // alert(JSON.stringify(data));
                 // alert(data['member'].[0].name);

             },
             error: function(errorThrown) {
                 alert(JSON.stringify(errorThrown));
             }
         });
         // alert(input_date+'------'+cat+'-------'+f_id);
     });






/*===================== Porul Submit ====================*/
$('#porul_submit').click(function() {
     // alert($('#f_id').val());
    // $('#f_id').prop('selectedIndex',0);
    porul_submit();
 });

function porul_submit()
{
    if($('.first_item').val()!='')
{
 $.ajax({
             type: "POST",
             url: "controls/porul_check.php",
             data: $('#porul_form').serialize(),
             // dataType: "json",
             success: function(data) {
$('#input-barcode').show();
                 // alert(JSON.stringify(data));
                 if(data=='inserted')
                 {
                    $('.clear').val('');
                    $('.receipt_panel').hide();
                    $('#input-barcode').focus();
                    location.reload();
                }
                else if(data=='not inserted')
                {
                    alert('Please check the values')
                     //alert();
         $('#loader').hide();
                 //$('#test').html("Data Inserted");
                }
             },
             error: function(xhtp) {
$('#input-barcode').show();
                 alert('error' + JSON.stringify(xhtp));
                 //$('#test').html(JSON.stringify(xhtp));
             }
         });

}
else{
    alert('Please fill the required fields');
}
    
}






    $('#monthly_amt').keydown(function()
    {
        if (event.altKey) {
            // alert();
            // $('#msnry_amt').focus();
        }
    });
    $('#msnry_amt').keydown(function()
    {
        if (event.ctrlKey) {
            // alert();
            $('#rice_amt').focus();
        }
    });

     /*====================== Receipt Entry ================== */
     $('#default_submit').click(function() {
         default_submit();
         //alert();
         
     });

  $('.default').keydown(function(event) {
    // alert();
  if (event.ctrlKey && event.keyCode === 13) {
    
    // $(this).trigger('submit');
    default_submit();
  }
});

     function default_submit()
     {
        // alert();
        if($('#monthly_amt').val()!=''|| $('#msnry_amt').val()!='' || $('#rice_amt').val()!='')
        {
        $('#loader').show();

         var amt1 = $('#monthly_amt').val();
         var desc1 = $('#monthly_desc').val();
         var amt2 = $('#msnry_amt').val();
         var desc2 = $('#msnry_desc').val();
         var amt3 = $('#rice_amt').val();
         var desc3 = $('#rice_desc').val();
         var f_id = $('#family_id').val();
         var m_id = $('#member_id').val();
         var r_date = $('#receipt_date').val();
         // alert(amt2);
         $.ajax({
             type: "POST",
             url: "controls/receipt_check.php",
             data: {
                 cat_id: 0,
                 monthly_amt: amt1,
                 monthly_desc: desc1,
                 msnry_amt: amt2,
                 msnry_desc: desc2,
                 rice_amt: amt3,
                 rice_desc: desc3,
                 family_id: f_id,
                 member_id: m_id,
                 receipt_date: r_date,
             },
             // dataType: "json",
             success: function(data) {
                 alert(JSON.stringify(data));
                 if(data=='inserted')
                 {
                    $('.clear').val('');
                    $('.receipt_panel').hide();
                    location.reload();
                }
                else if(data=='not inserted')
                {
                    alert('Please check the values')
                     //alert();
         $('#loader').hide();
                 //$('#test').html("Data Inserted");
                }
             },
             error: function(xhtp) {
                 alert('error' + JSON.stringify(xhtp));
                 //$('#test').html(JSON.stringify(xhtp));
             }
         });
     }

     }


$('.bday_bill').keydown(function(event) {
    // alert();
  if (event.ctrlKey && event.keyCode === 13) {
    
    // $(this).trigger('submit');
    bday_submit()
  }
});

     $('#bday_submit').click(function() {

         // alert();
         bday_submit();
        

     });
     function bday_submit()
     {
         $('#loader').show();
         var amt1 = $('#bday_amt').val();
         var desc1 = $('#bday_desc').val();
         var cat_id1 = $('#category_id').val();

         var f_id = $('#family_id').val();
         var m_id = $('#member_id').val();
         var r_date = $('#receipt_date').val();
         $.ajax({
             type: "POST",
             url: "controls/receipt_check.php",
             data: {
                 cat_id: cat_id1,
                 bday_amt: amt1,
                 bday_desc: desc1,
                 family_id: f_id,
                 member_id: m_id,
                 receipt_date: r_date,
             },
             // dataType: "json",
             success: function(data) {
                 //alert(JSON.stringify(data));
                 $('.clear').val('');
                 $('.receipt_panel').hide();
                 $('#test').html("Data Inserted");
                 location.reload();
             },
             error: function(xhtp) {
                 alert('error' + JSON.stringify(xhtp));
                 //$('#test').html(JSON.stringify(xhtp));
             }
         });
     }
     $('.common_bill').keydown(function(event) {
    // alert();
  if (event.ctrlKey && event.keyCode === 13) {
    
    // $(this).trigger('submit');
    common_submit()
  }
});
     $('#common_submit').click(function() {

         // alert();
        common_submit();
     });
     function common_submit()
{
     $('#loader').show();
         var amt1 = $('#common_amt').val();
         var desc1 = $('#common_desc').val();
         var cat_id1 = $('#category_id').val();

         var f_id = $('#family_id').val();
         var m_id = $('#member_id').val();
         var r_date = $('#receipt_date').val();
         $.ajax({
             type: "POST",
             url: "controls/receipt_check.php",
             data: {
                 cat_id: cat_id1,
                 receipt_amt: amt1,
                 receipt_desc: desc1,
                 family_id: f_id,
                 member_id: m_id,
                 receipt_date: r_date,
             },
             // dataType: "json",
             success: function(data) {
                 // alert(JSON.stringify(data));
                 $('.clear').val('');
                 $('.receipt_panel').hide();
                 $('#test').html("Data Inserted");
                 location.reload();
             },
             error: function(xhtp) {
                 alert('error' + JSON.stringify(xhtp));
                 //$('#test').html(JSON.stringify(xhtp));
             }
         });

} 



     $('#porul_submit2').click(function()
     {
        // alert();
        porul_submit2();
     });
     function porul_submit2()
     {
        if($('.first_item2').val()!='')
{
 $.ajax({
             type: "POST",
             url: "controls/receipt_check.php",
             data: $('#porul_form2').serialize(),
             // dataType: "json",
             success: function(data) {
$('#input-barcode').show();
                  // alert(JSON.stringify(data));
                 if(data=='inserted')
                 {
                    $('.clear').val('');
                    $('.receipt_panel').hide();
                    $('#input-barcode').focus();
                    location.reload();
                }
                else if(data=='not inserted')
                {
                    alert('Please check the values')
                     //alert();
         $('#loader').hide();
                 //$('#test').html("Data Inserted");
                }
             },
             error: function(xhtp) {
$('#input-barcode').show();
                 alert('error' + JSON.stringify(xhtp));
                 //$('#test').html(JSON.stringify(xhtp));
             }
         });

}
else{
    alert('Please fill the required fields');
}
     }

$(document).on("click", '.edit_receipt',function()
    {
        // alert();
        // alert($(this).attr('data-id'));
        var receipt_id=$(this).attr('data-id');
        var amount=$(this).attr('data-amt');
        var desc=$(this).attr('data-desc');
        var r_date=$(this).attr('data-date1');
        var f_head=$(this).attr('data-f_head');
        var f_id=$(this).attr('data-f_id');
        var cat=$(this).attr('data-cat');

        $('#edit_receipt_id').val(receipt_id);
        $('#edit_amt').val(amount);
        $('#edit_desc').val(desc);
        $('#edit_date').val($(this).attr('data-date1'));
        $('#edit_f_head').html(f_head);
        $('#edit_f_id').html(f_id);
        $('#edit_cat').html(cat);
        $('#label_receipt').html(receipt_id);
    });
$(document).on("click", '.delete_receipt',function()
    {
        // alert();
        // alert($(this).attr('data-id'));
        var receipt_id=$(this).attr('data-id');
        var amount=$(this).attr('data-amt');
        var desc=$(this).attr('data-desc');
        var r_date=$(this).attr('data-date1');
        var f_head=$(this).attr('data-f_head');
        var f_id=$(this).attr('data-f_id');
        var cat=$(this).attr('data-cat');

        $('#delete_receipt_id').val(receipt_id);
        $('#delete_amt').val(amount);
        $('#delete_desc').val(desc);
        $('#delete_date').val($(this).attr('data-date1'));
        $('#delete_f_head').html(f_head);
        $('#delete_f_id').html(f_id);
        $('#delete_cat').html(cat);
        $('#label_receipt').html(receipt_id);
    });

$('.edit_receipt').click(function()
    {
        // alert($(this).attr('data-id'));
        var receipt_id=$(this).attr('data-id');
        var amount=$(this).attr('data-amt');
        var desc=$(this).attr('data-desc');
        var r_date=$(this).attr('data-date1');
        var f_head=$(this).attr('data-f_head');
        var f_id=$(this).attr('data-f_id');
        var cat=$(this).attr('data-cat');

        $('#edit_receipt_id').val(receipt_id);
        $('#edit_amt').val(amount);
        $('#edit_desc').val(desc);
        $('#edit_date').val($(this).attr('data-date1'));
        $('#edit_f_head').html(f_head);
        $('#edit_f_id').html(f_id);
        $('#edit_cat').html(cat);
        $('#label_receipt').html(receipt_id);
// alert($(this).attr('data-date1'));
    });
$('#edit_family_bar').change(function()
{
    $('#bar_form').submit();
});

$('#family_list_place').change(function()
{
    $('#place_form').submit();
});
$('#family_list_name').change(function()
{
    $('#name_form').submit();
});


$('#report_type').change(function()
    {
        // alert($(this).val());
        var type=$(this).val();
        var category=$('#category').val();
        if(category==0)
        {
        if(type=='Income')
        {
            $('#report_form').attr('action','income_pdf.php');
        }
        else if(type=='Expence')
        {
            $('#report_form').attr('action','expence_pdf.php');
        }
        else if(type=='Both')
        {  
            $('#report_form').attr('action','overall-report.php');
        }
        else if(type=='Individual')
        {
            $('#report_form').attr('action','common-report.php');
        }
    }
    });

$('.cat-button').click(function()
    {
        // alert($(this).attr('data-id'));
        var cid=$(this).attr('data-id');
        $('#category').val(cid);
        // alert(cid);
        var cdate=$('#receipt_date').val();
        $('.cat-button').removeClass("active");
        $(this).addClass("active");
        $.ajax({
             type: "POST",
             url: "controls/populate_wreport.php",
             data: {id:cid,date:cdate},
             // dataType: "json",
             success: function(data) {
                // alert(JSON.stringify(data));
                $('#wreport_table').html(data);
             },
             error: function(xhtp) {
                 alert('error' + JSON.stringify(xhtp));
                 //$('#test').html(JSON.stringify(xhtp));
             }
         });
    });




     /*End of document.read */
 });