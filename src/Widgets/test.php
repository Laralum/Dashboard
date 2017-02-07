<?php

return ConsoleTVs\Charts\Facades\Charts::create('line', 'material')
            ->values([1, 3, 2, 4])
            ->labels(['First', 'Second', 'Third', 'Fourth'])
            ->title('This is a sample widget from Dashboard module!')
            ->height(250)
            ->render();
