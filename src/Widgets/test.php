<?php

return ConsoleTVs\Charts\Charts::new('line', 'material')
            ->setValues([1, 3, 2, 4])
            ->setLabels(['First', 'Second', 'Third', 'Fourth'])
            ->setResponsive(false)
            ->setHeight(250)
            ->setWidth(0)
            ->setTitle('This is a sample widget from Dashboard module!')
            ->render();
