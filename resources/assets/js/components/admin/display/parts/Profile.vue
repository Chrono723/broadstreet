<template>

    <li class="dropdown navbar-profile">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="meta">
                            <span class="avatar"><img src="http://img.djavaui.com/?create=35x35,4888E1?f=ffffff" class="img-circle" alt="admin"></span>
                            <span class="text hidden-xs hidden-sm text-muted">{{userName}}</span>
                            <span class="caret"></span>
                        </span>
        </a>
        <!-- Start dropdown menu -->
        <ul class="dropdown-menu animated flipInX">
            <li class="dropdown-header">Account</li>
            <li><a href="/page/profile"><i class="fa fa-user"></i>View profile</a></li>
            <li><a href="/mail/inbox"><i class="fa fa-envelope-square"></i>Inbox <span class="label label-info pull-right">30</span></a></li>
            <li><a href="#"><i class="fa fa-share-square"></i>Invite a friend</a></li>
            <li class="dropdown-header">Product</li>
            <li><a href="#"><i class="fa fa-upload"></i>Upload</a></li>
            <li><a href="#"><i class="fa fa-dollar"></i>Earning</a></li>
            <li><a href="#"><i class="fa fa-download"></i>Withdrawals</a></li>
            <li class="divider"></li>
            <li><a href="/'page/signin"><i class="fa fa-sign-out"></i>Logout</a></li>
        </ul>

    </li>

</template>

<script>

    export default {
        props: [
            'userName'
        ],

        data(){
            return {

            };
        },
        mounted(){

        }
    }
</script>