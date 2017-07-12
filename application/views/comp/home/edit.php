<div class="panel panel-primary">

    <div class="panel-heading">
        <h3 class="panel-title">Edit User</h3>
    </div>

    <div class="panel-body">

        <form role="form" action="<?php echo site_url(SiteConfig::CONTROLLER_HOME . SiteConfig::METHOD_HOME_UPDATE); ?>" method="POST">
            <input name="<?php echo DBConfig::ATT_USERS_ID; ?>" type="hidden" value="<?php echo $user[DBConfig::ATT_USERS_ID]; ?>"/>
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input name="<?php echo DBConfig::ATT_USERS_NAME; ?>" required type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" value="<?php echo $user[DBConfig::ATT_USERS_NAME]; ?>"/>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">State</label>
                <input name="<?php echo DBConfig::ATT_USERS_STATE; ?>" required type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter state" value="<?php echo $user[DBConfig::ATT_USERS_STATE]; ?>"/>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Select Type</label>
                <select name="<?php echo DBConfig::ATT_USERS_USER_TYPE; ?>" required class="form-control">
                    <option value="">Please Select ...</option>
                    <option <?php echo ($user[DBConfig::ATT_USERS_USER_TYPE] == 'A') ? 'selected' : ''; ?> value="A">A</option>
                    <option <?php echo ($user[DBConfig::ATT_USERS_USER_TYPE] == 'B') ? 'selected' : ''; ?> value="B">B</option>
                    <option <?php echo ($user[DBConfig::ATT_USERS_USER_TYPE] == 'C') ? 'selected' : ''; ?> value="C">C</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Select Type</label>
                <select name="<?php echo DBConfig::ATT_USERS_TYPE; ?>" required class="form-control">
                    <option value="">Please Select ...</option>
                    <option <?php echo ($user[DBConfig::ATT_USERS_TYPE] == 'Prospective') ? 'selected' : ''; ?> value="Prospective">Prospective</option>
                    <option <?php echo ($user[DBConfig::ATT_USERS_TYPE] == 'Current') ? 'selected' : ''; ?> value="Current">Current</option>
                    <option <?php echo ($user[DBConfig::ATT_USERS_TYPE] == 'Current') ? 'Both' : ''; ?> value="Both">Both</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-lg"></i>&nbsp;Save</button>
        </form>

    </div>
    <div class="panel-footer">Developed By Winexsoft Technology</div>
</div>
