$(document).ready(function(){ 
    var count = 0;
   
    $('#perkiraan_dialog').dialog({
     autoOpen:false,
     width:400,
     
    });
   
    $('#add').click(function(){
     var tgl_gaji = '';
     var error_tgl_gaji = '';
       if($('#tgl_gaji').val() == '')
       {
         error_tgl_gaji = 'Periode Permintaan perlu dipilih';
         $('#error_tgl_gaji').text(error_tgl_gaji);
         $('#tgl_gaji').css('border-color', '#cc0000');
         tgl_gaji = '';
       } else {
         error_tgl_gaji = '';
         $('#error_tgl_gaji').text(error_tgl_gaji);
         $('#tgl_gaji').css('border-color', '');
         tgl_gaji = $('#tgl_gaji').val();
         $('#perkiraan_dialog').dialog('option', 'title', 'Add Data');
         $('#perkiraan_id').val('');
         $('#jumlah_uang_makan').val('');
         $('#error_perkiraan_id').text('');
         $('#error_jumlah_uang_makan').text('');
         $('#perkiraan_id').css('border-color', '');
         $('#jumlah_uang_makan').css('border-color', '');
         $('#save').text('Save');
         $('#perkiraan_dialog').dialog('open');
       }
     });
   
    $('#save').click(function(){
     var error_perkiraan_id = '';
     var error_jumlah_uang_makan = '';
     var perkiraan_id = '';
     var jumlah_uang_makan = '';
     if($('#perkiraan_id').val() == '')
     {
      error_perkiraan_id = 'Jenis perkiraan perlu dipilih';
      $('#error_perkiraan_id').text(error_perkiraan_id);
      $('#perkiraan_id').css('border-color', '#cc0000');
      perkiraan_id = '';
     }
     else
     {
      error_perkiraan_id = '';
      $('#error_perkiraan_id').text(error_perkiraan_id);
      $('#perkiraan_id').css('border-color', '');
      perkiraan_id = $('#perkiraan_id').val();
     } 
     if($('#jumlah_uang_makan').val() == '')
     {
      error_jumlah_uang_makan = 'Jumlah uang_makan perlu diisi';
      $('#error_jumlah_uang_makan').text(error_jumlah_uang_makan);
      $('#jumlah_uang_makan').css('border-color', '#cc0000');
      jumlah_uang_makan = '';
     }
     else
     {
      error_jumlah_uang_makan = '';
      $('#error_jumlah_uang_makan').text(error_jumlah_uang_makan);
      $('#jumlah_uang_makan').css('border-color', '');
      jumlah_uang_makan = $('#jumlah_uang_makan').val();
     }
     if(error_perkiraan_id != '' || error_jumlah_uang_makan != '')
     {
      return false;
     }
     else
     {
      if($('#save').text() == 'Save')
      {
       count = count + 1;
       output = '<tr id="row_'+count+'">';
       output += '<td>'+perkiraan_id+'<input type="hidden" id="perkiraan_id'+count+'" name="hidden_perkiraan_id[]"  class="perkiraan_id" value="'+perkiraan_id+'" /></td>';
       output += '<td>'+jumlah_uang_makan+'<input type="hidden" id="jumlah_uang_makan'+count+'" name="hidden_jumlah_uang_makan[]"  value="'+jumlah_uang_makan+'" /></td>';
       output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+count+'">View</button></td>';
       output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'">Remove</button></td>';
       output += '</tr>';
       $('#data_perkiraan').append(output);
       $('#id_user').attr('disabled','disabled'); 
       $('#tgl_gaji').attr('disabled','disabled'); 
      }
      else 
      {
       var row_id = $('#hidden_row_id').val();
       output = '<td>'+perkiraan_id+' <input type="hidden" name="hidden_perkiraan_id[]" id="perkiraan_id'+row_id+'" class="perkiraan_id" value="'+perkiraan_id+'" /></td>';
       output += '<td>'+jumlah_uang_makan+' <input type="hidden" name="hidden_jumlah_uang_makan[]" id="jumlah_uang_makan'+row_id+'" value="'+jumlah_uang_makan+'" /></td>';
       output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+row_id+'">View</button></td>';
       output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+row_id+'">Remove</button></td>';
       $('#row_'+row_id+'').html(output);
      }
      $('#perkiraan_dialog').dialog('close');
     }
    });
   
    $(document).on('click', '.view_details', function(){
     var row_id = $(this).attr("id");
     var perkiraan_id = $('#perkiraan_id'+row_id+'').val();
     var jumlah_uang_makan = $('#jumlah_uang_makan'+row_id+'').val();
     $('#perkiraan_id').val(perkiraan_id);
     $('#jumlah_uang_makan').val(jumlah_uang_makan);
     $('#save').text('Edit');
     $('#hidden_row_id').val(row_id);
     $('#perkiraan_dialog').dialog('option', 'title', 'Edit Data');
     $('#perkiraan_dialog').dialog('open');
    });
   
    $(document).on('click','.remove_details', function(){
     var row_id = $(this).attr("id");
     if(confirm("Are you sure you want to remove this row data?"))
     {
      $('#row_'+row_id+'').remove();
      let data_perkiraan_length = $("#data_perkiraan tr").length;
      if(data_perkiraan_length < 2){
        $('#id_user').removeAttr('disabled'); 
        $('#tgl_gaji').removeAttr('disabled'); 
      }
     }
     else
     {
      return false;
     }
    });
   
    $('#action_alert').dialog({
     autoOpen:false
    });
   
   
   $('#perkiraan_form').on('submit', function(event){
     event.preventDefault();
     $('#id_user').removeAttr('disabled'); 
     $('#tgl_gaji').removeAttr('disabled');
     var count_data = 0;
     $('.perkiraan_id').each(function(){
      count_data = count_data + 1;
     });
     if(count_data > 0)
     {
      var form_data = $(this).serialize();
      $.ajax({
       url:"Umakan/tambahUangMakan",
       method:"POST",
       data:form_data,
       success:function(data)
       {
        $('#data_perkiraan').find("tr:gt(0)").remove();
        $('#action_alert').html('<p>Data Inserted Successfully</p>'); 
        $('#action_alert').dialog('open');
        document.location.href = "Umakan";
       },
       error:function(xml,text,error)
       {
        $('#action_alert').html('<p>Please Add atleast one data</p>');
        $('#action_alert').dialog('open');
       }
      })
     }
     else
     {
      $('#action_alert').html('<p>Please Add atleast one data</p>');
      $('#action_alert').dialog('open');
     }
    });
    
   });  