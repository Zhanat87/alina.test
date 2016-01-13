<?php
use yii\helpers\Url;
?>
<div id="nav-col">
    <section id="col-left" class="col-left-nano">
        <div id="col-left-inner" class="col-left-nano-content">
            <div class="collapse navbar-collapse navbar-ex1-collapse" id="sidebar-nav">
                <ul class="nav nav-pills nav-stacked">
                    <?php if ($menu) : ?>
                        <?php foreach ($menu as $item) : ?>
                            <?php
                            if (isset($item['visible']) && !$item['visible']) {
                                continue;
                            }
                            ?>
                            <?php if (isset($item['subMenu'])) : ?>
                                <?php if (isset($item['active']) && $item['active']) : ?>
                                    <li class="open active">
                                <?php else : ?>
                                    <li class="">
                                <?php endif; ?>
                                <a href="#" class="dropdown-toggle">
                                    <i class="<?php echo $item['icon']; ?>"></i>
                                    <span>
                                        <?php echo $item['label']; ?>
                                    </span>
                                    <i class="fa fa-chevron-circle-right drop-icon"></i>
                                </a>
                                <ul class="submenu">
                                    <?php foreach ($item['subMenu'] as $subMenuItem) : ?>
                                        <?php
                                        if (isset($subMenuItem['visible']) && !$subMenuItem['visible']) {
                                            continue;
                                        }
                                        ?>
                                        <?php if (isset($subMenuItem['active']) &&
                                            $subMenuItem['active']) : ?>
                                            <?php if (isset($subMenuItem['subSubMenu'])) : ?>
                                                <li class="has-sub-sub active">
                                            <?php else : ?>
                                                <li class="active">
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <?php if (isset($subMenuItem['subSubMenu'])) : ?>
                                                <li class="has-sub-sub">
                                            <?php else : ?>
                                                <li>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if (isset($subMenuItem['subSubMenu'])) : ?>
                                            <a href="javascript:;">
                                                <span class="sub-menu-text">
                                                    <?php echo $subMenuItem['label']; ?>
                                                </span>
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="open" style="display: none;">
                                                <?php foreach ($subMenuItem['subSubMenu'] as $subSubMenuItem) : ?>
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
                                        <?php else : ?>
                                            <a href="<?php echo $subMenuItem['url']; ?>">
                                                <span class="sub-menu-text">
                                                    <?php echo $subMenuItem['label']; ?>
                                                </span>
                                            </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                                </li>
                            <?php else : ?>
                                <?php if (isset($item['active']) && $item['active']) : ?>
                                    <li class="active">
                                <?php else : ?>
                                    <li>
                                <?php endif; ?>
                                <a href="<?php echo $item['url']; ?>">
                                    <?php if (isset($item['icon'])) : ?>
                                        <i class="<?php echo $item['icon']; ?>"></i>
                                    <?php endif; ?>
                                    <span class="menu-text">
                                        <?php echo $item['label']; ?>
                                    </span>
                                </a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </section>
</div>