<nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index1.php">I.E.I</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-envelope fa-fw"></i>
					<?php
						include_once 'db.php';
						$sql = 'SELECT Message FROM clients WHERE ID='.$_SESSION['userID'];
						$res = mysqli_query( $db, $sql );
						$num = 0;
						if( !is_bool($res) )
						{
							$array = mysqli_fetch_array($res);
							if( $array['Message'] != NULL )
							{
								$num = mysqli_num_rows($res);
								if( $num > 0 )
								{
									echo "<span class=\"badge\">$num</span>";
								}
							}
						}
					?>
						<i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                    <?php					
						if( $num > 0 )
						{
							do
							{
								echo '<li>'.
										'<a href="#">'.
												'<div>'.$array['Message'].'</div>'.
										'</a>'.
									 '</li><li class="divider"></li>';
							}
							while($array = mysqli_fetch_array($res));
						}
						else
						{
							echo '<li>'.
									'<a href="#">'.
											'<div>No Messages</div>'.
									'</a>'.
								 '</li><li class="divider"></li>';
						}
					?>
					<li><a href="functions/delmsg.php"><button type="button" class="btn btn-warning">Delete All</button></a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="profile.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="functions/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>