<!DOCTYPE html>
<html>
<head>
  <title>Codeigniter 4 Send Push Notification using Google FCM Example</title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
 <div class="container">
    <br>
    <?= \Config\Services::validation()->listErrors(); ?>

    <div class="row">
      <div class="col-md-9">
        <form action="<?php echo base_url('public/index.php/notification/sendPushNotification') ?>" method="post" accept-charset="utf-8">

          <div class="form-group">
            <label for="formGroupExampleInput">Device Type</label>
              <select class="form-control" id="device_type" name="device_type" required="">
              <option value="">Select Device type</option>
               
                    <option value="android">Android</option>
                    <option value="iphone">IOS</option>
  
              </select>
          </div>           

          <div class="form-group">
            <label for="formGroupExampleInput">Notification Id</label>
            <input type="text" name="nId" class="form-control" id="formGroupExampleInput" placeholder="Please enter notification id" required="">
            
          </div> 

          <div class="form-group">
           <button type="submit" id="send_form" class="btn btn-success">Submit</button>
          </div>
        </form>
      </div>

    </div>
 
</div>
</body>
</html>