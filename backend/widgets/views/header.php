<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
?>
<header class="navbar" id="header-navbar">
    <div class="container">
        <a href="/" id="logo" class="navbar-brand">
            <?php echo Html::img('/images/logo.png', ['class' => 'normal-logo']); ?>
        </a>
        <div class="clearfix">
            <button class="navbar-toggle" data-target=".navbar-ex1-collapse" data-toggle="collapse" type="button">
                <span class="sr-only">
                    Toggle navigation
                </span>
                <span class="fa fa-bars"></span>
            </button>
            <div class="nav-no-collapse navbar-left pull-left hidden-sm hidden-xs">
                <ul class="nav navbar-nav pull-left">
                    <li>
                        <a class="btn" id="make-small-nav">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="nav-no-collapse navbar-left pull-left hidden-sm hidden-xs">
                <ul id="navbar-left" class="nav navbar-nav pull-left hidden-xs headerMenu">
                    <?php if ($menu) : ?>
                        <?php foreach ($menu as $item) : ?>
                            <?php
                            if (isset($item['visible']) && !$item['visible']) {
                                continue;
                            }
                            ?>
                            <?php if (isset($item['subMenu'])) : ?>
                                <?php if (isset($item['active']) && $item['active']) : ?>
                                    <li class="dropdown active">
                                <?php else : ?>
                                    <li class="dropdown">
                                <?php endif; ?>
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <i class="<?php echo $item['icon']; ?>"></i>
                                        <span class="name">
                                            <?php echo $item['label']; ?>
                                        </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu skins">
                                    <?php foreach ($item['subMenu'] as $subMenuItem) : ?>
                                        <?php
                                        if (isset($subMenuItem['visible']) && !$subMenuItem['visible']) {
                                            continue;
                                        }
                                        ?>
                                        <?php if (isset($subMenuItem['url'])) : ?>
                                            <?php if (isset($subMenuItem['active']) &&
                                                $subMenuItem['active']) : ?>
                                                <?php if (isset($subMenuItem['subSubMenu'])) : ?>
                                                    <li class="dropdown-submenu active">
                                                <?php else : ?>
                                                    <li class="active">
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <?php if (isset($subMenuItem['subSubMenu'])) : ?>
                                                    <li class="dropdown-submenu">
                                                <?php else : ?>
                                                    <li>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <li class="dropdown-title">
                                        <?php endif; ?>
                                        <?php if (isset($subMenuItem['url'])) : ?>
                                        <a href="<?php echo $subMenuItem['url']; ?>">
                                        <?php else : ?>
                                        <span>
                                    <?php endif; ?>
                                        <?php if (isset($subMenuItem['icon'])) : ?>
                                            <i class="<?php echo
                                            $subMenuItem['icon']; ?>"></i>
                                        <?php endif; ?>
                                        <?php echo $subMenuItem['label']; ?>
                                        <?php if (isset($subMenuItem['url'])) : ?>
                                        </a>
                                    <?php else : ?>
                                        </span>
                                    <?php endif; ?>
                                        <?php if (isset($subMenuItem['subSubMenu'])) : ?>
                                            <ul class="dropdown-menu">
                                                <?php foreach ($subMenuItem['subSubMenu'] as
                                                               $subSubMenuItem) : ?>
                                                    <?php
                                                    if (isset($subSubMenuItem['visible']) &&
                                                        !$subSubMenuItem['visible']) {
                                                        continue;
                                                    }
                                                    ?>
                                                    <?php if (isset($subSubMenuItem['active']) &&
                                                        $subSubMenuItem['active']) : ?>
                                                        <li class="active">
                                                    <?php else : ?>
                                                        <li>
                                                    <?php endif; ?>
                                                    <a href="<?php echo $subSubMenuItem['url']; ?>">
                                                        <span class="sub-sub-menu-text">
                                                            <?php echo $subSubMenuItem['label']; ?>
                                                        </span>
                                                    </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                                </li>
                            <?php else : ?>
                                <?php if (isset($item['active']) && $item['active']) : ?>
                                    <li class="active">
                                <?php else : ?>
                                    <li>
                                <?php endif; ?>
                                <a href="<?php echo $item['url']; ?>" class="dropdown-toggle">
                                    <?php if (isset($item['icon'])) : ?>
                                        <i class="<?php echo $item['icon']; ?>"></i>
                                    <?php endif; ?>
                                    <span class="name">
                                        <?php echo $item['label']; ?>
                                    </span>
                                </a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="nav-no-collapse pull-right" id="header-nav">
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown profile-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="hidden-xs">
                                <?php echo Yii::$app->user->identity->username; ?>
                            </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo Yii::$app->getUrlManager()->createUrl(['user/deny/profile']); ?>">
                                    <i class="fa fa-user"></i>
                                    Профиль
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo Yii::$app->getUrlManager()->createUrl(['user/deny/profile-edit']); ?>">
                                    <i class="fa fa-pencil"></i>
                                    Редактировать профиль
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo Yii::$app->getUrlManager()->createUrl(['user/deny/logout']); ?>"
                                   data-method="post">
                                    <i class="fa fa-power-off"></i>
                                    Выйти
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="hidden-xxs">
                        <a href="<?php echo Yii::$app->getUrlManager()->createUrl(['user/deny/logout']); ?>"
                           data-method="post" class="btn">
                            <i class="fa fa-power-off"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>