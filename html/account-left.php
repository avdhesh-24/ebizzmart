<div class="col-md-2">
    <div class="LeftPanelSec">
        <?php if($user=='User Profile'){?>
        <div class="card links mb-4">
            <div class="card-body d-flex align-items-center prodebox">
                <div class="proimg"><img src="img/man-colored.svg"></div>
                <div class="ms-3">
                    <p class="m-0 text-secondary">Hello,</p>
                    <h5 class="m-0"><strong>Sumit Kumar</strong></h5>
                </div>
            </div>
            <button class="navbar-toggler d-none" type="button" id="AccMenuBar" data-bs-toggle="collapse" data-bs-target="#AccountMenu" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"><span>Account Menu</span><i class="fa fa-bars"></i></button>
        </div><?php };?>
        <div class="card cardbox mb-4" id="AccountMenu">
            <div class="card-body Leftpanel">
                <ul>
                    <li <?php if($active=='My Profile')echo'class="active"';?>><a title="My Profile" href="user-profile.php"><i class="fal fa-user me-2"></i> My Profile</a></li>
                    <li <?php if($active=='Business Card')echo'class="active"';?>><a title="Business Card" href="business-card.php"><i class="fal fa-address-card me-2"></i> Business Card</a></li>
                    <li <?php if($active=='Company Info')echo'class="active"';?>><a title="Company Info" href="company-info.php"><i class="fal fa-building me-2"></i> Company Info</a></li>
                    <li <?php if($active=='Manage Product')echo'class="active"';?>><a title="Manage Product" href="manage-product.php"><i class="fal fa-heart me-2"></i> Manage Product</a></li>
                    <li <?php if($active=='Message')echo'class="active"';?>><a title="Message" href="message.php"><i class="fal fa-envelope me-2"></i> Message</a></li>
                    <li <?php if($active=='Contacts List')echo'class="active"';?>><a title="Contacts List" href="contacts-list.php"><i class="fal fa-id-badge me-2"></i> Contacts List</a></li>
                    <li <?php if($active=='Social Connections')echo'class="active"';?>><a title="Social Connections" href="social.php"><i class="fal fa-thumbs-up me-2"></i> Social Connections</a></li>
                    <li <?php if($active=='Boots Inquiries')echo'class="active"';?>><a title="Boots Inquiries" href="inquiries.php"><i class="fal fa-comment-alt-edit me-2"></i> Boots Inquiries</a></li>
                    <li <?php if($active=='Account Wallet')echo'class="active"';?>><a title="Account Wallet" href="wallet.php"><i class="fal fa-wallet me-2"></i> Account Wallet</a></li>
                    <li><a title="Policies" href="./"><i class="fal fa-power-off me-2"></i> Logout</a></li>
                </ul>
            </div>
        </div>
        <div class="card cardbox d-none" id="MailBoxP">
            <div class="card-body Leftpanel MLeftpanel">
                <div class="Compose">
                    <a href="#" class="btn btn-main w-100 mt-0">Compose</a>
                </div>
                <ul>
                    <li <?php if($active=='Message')echo'class="active"';?>><a href="#" class="router-link-exact-active active"><i class="fal fa-inbox me-2"></i><span>Inbox <span class="badge bg-info">12</span></span></a></li>
                    <li><a href="#"><i class="fal fa-envelope me-2"></i> <span>Sent</span></a></li>
                    <li><a href="#"><i class="fal fa-save me-2"></i> <span>Draft</span></a></li>
                    <li><a href="#"><i class="fal fa-flag me-2"></i> <span>Flagged</span></a></li>
                    <li><a href="#"><i class="fal fa-bug me-2"></i> <span>Spam</span></a></li>
                    <li><a href="#"><i class="fal fa-trash me-2"></i> <span>Trash</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>