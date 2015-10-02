<?php

use backend\assets\ContractorAsset;

ContractorAsset::register($this);
?>
<div class="row contractorDiv">
    <div class="wizard" id="myWizard">
        <div class="wizard-inner">
            <ul class="steps">
                <li class="<?php echo $liClasses[1]; ?>">
                    <span class="badge<?php echo $badgeClasses[1]; ?>">
                        1
                    </span>
                    Организации
                    <span class="chevron"></span>
                </li>
                <li class="<?php echo $liClasses[2]; ?>">
                    <span class="badge<?php echo $badgeClasses[2]; ?>">
                        2
                    </span>
                    Отделения
                    <span class="chevron"></span>
                </li>
                <li class="<?php echo $liClasses[3]; ?>">
                    <span class="badge<?php echo $badgeClasses[3]; ?>">
                        3
                    </span>
                    Персонал
                    <span class="chevron"></span>
                </li>
            </ul>
            <div class="actions">
                <button class="btn btn-default btn-mini btn-prev"<?php echo $isFirst; ?>>
                    &DoubleLongLeftArrow;&nbsp;Предыдущее
                </button>
                <button class="btn btn-success btn-mini btn-next"<?php echo $isLast; ?>>
                    <?php echo $nextLabel; ?>
                </button>
            </div>
            <div class="hide">
                <a class="prevA" href="<?php echo $prev; ?>">
                    Предыдущее
                </a>
                <a class="nextA" href="<?php echo $next; ?>">
                    Предыдущее
                </a>
                <?php foreach ($urls as $text => $href) : ?>
                    <a class="stepsA" href="<?php echo $href; ?>">
                        <?php echo $text; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>