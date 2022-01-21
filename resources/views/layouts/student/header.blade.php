
<div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <!-- search -->
                <div class="search">
                <form action="#" method="post">
                @csrf
                    <label>
                        <input type="text" name="search" placeholder="Search here...">
                        <button class="btn-search"><ion-icon name="search-outline"></ion-icon></button>
                    </label>
                </form>
                </div>
                <!-- userImg -->
                <div class="user">
                    <img src="<?php echo asset('images/user-male.png') ?>" width="80px" height="80px">
                </div>
            </div>

            <!-- cards -->
            <!-- <div class="cardBox">
                <div class="card">
                    <div>
                         <div class="numbers">1,550</div>
                        <div class="cardName">Users</div>
                    </div>
                    <div class="iconBox">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">200</div>
                        <div class="cardName">Courses</div>
                    </div>
                    <div class="iconBox">
                        <ion-icon name="book-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">50</div>
                        <div class="cardName">Inactive</div>
                    </div>
                    <div class="iconBox">
                        <ion-icon name="sad-outline"></ion-icon>
                    </div>
                </div>
            </div> -->