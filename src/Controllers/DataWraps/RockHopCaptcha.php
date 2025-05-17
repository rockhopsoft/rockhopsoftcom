<?php
/**
  *
  *
  * Survloop - All Our Data Are Belong
  * @package  rockhopsoft/survloop
  * @author  Morgan Lesko <rockhoppers@runbox.com>
  * @since  v0.4.0
  */
namespace RockHopSoft\RockHopSoftCom\Controllers\DataWraps;

class RockHopCaptcha
{
    private $imgPath = '/rockhopsoftcom/captchas/';

    private $imgOpts = [
        [ '001', 'orange', 'right', 1],
        [ '002', 'orange', 'right', 2],
        [ '003', 'orange', 'right', 3],
        [ '004', 'orange', 'left',  3],
        [ '005', 'orange', 'left',  2],
        [ '006', 'orange', 'left',  1],
        [ '007', 'red',    'right', 1],
        [ '008', 'red',    'right', 2],
        [ '009', 'red',    'right', 3],
        [ '010', 'red',    'left',  3],
        [ '011', 'red',    'left',  2],
        [ '012', 'red',    'left',  1],
        [ '013', 'blue',   'right', 1],
        [ '014', 'blue',   'right', 2],
        [ '015', 'blue',   'right', 3],
        [ '016', 'blue',   'left',  3],
        [ '017', 'blue',   'left',  2],
        [ '018', 'blue',   'left',  1],
        [ '019', 'yellow', 'right', 1],
        [ '020', 'yellow', 'right', 2],
        [ '021', 'yellow', 'right', 3],
        [ '022', 'yellow', 'left',  3],
        [ '023', 'yellow', 'left',  2],
        [ '024', 'yellow', 'left',  1],
        [ '025', 'pink',   'right', 1],
        [ '026', 'pink',   'right', 2],
        [ '027', 'pink',   'right', 3],
        [ '028', 'pink',   'left',  3],
        [ '029', 'pink',   'left',  2],
        [ '030', 'pink',   'left',  1]
    ];

    private $colorDesc = [
        'red' => [
            'a ripe strawberry',
            'a fire truck',
            'a stop sign',
            'a heart emoji'
        ],
        'blue' => [
            'denim jeans',
            'the deep ocean',
            'a blueberry'
            //'a clear sky',
        ],
        'yellow' => [
            'a lemon peel',
            'a sunflower',
            'a bowl of corn',
            'a banana',
            'a lemon'
        ],
        'green' => [
            'a four-leaf clover',
            'a pine tree',
            'fresh spinach',
            'an avocado',
            'grass'
        ],
        'orange' => [
            'a pumpkin',
            'a basketball',
            'a traffic cone',
            'a carrot',
            'pumpkin pie'
        ],
        'pink' => [
            'a flamingo feather',
            'bubblegum'
        ]
    ];

    private $leftRights = [
        'left' => [
            '001', '004', '006', '007', '008', '012', '013', '015'
        ],
        'right' => [
            '002', '003', '005', '009', '010', '011', '014', '016', '017'
        ]
    ];

    private $counts = [
        1 => [
            '004', '008', '009', '012', '017',
            '022', '023', '025', '027', '029'
        ],
        2 => [
            '002', '005', '007', '014', '016',
            '020', '024', '026', '028', '030'
        ],
        3 => [
            '001', '003', '006', '010', '011',
            '013', '015', '018', '019', '021'
        ]
    ];

    /**
     * Load wrapper for uploaded survey files with relevant info.
     *
     * @param  App\Models\RHQuoteBigTech  $bigRow
     * @return void
     */
    public function __construct()
    {

    }

    public function getChallenge()
    {
        $optInd = random_int(0, (sizeof($this->imgOpts)-1));
        $correct = $this->imgOpts[$optInd];
        return [
            "correct" => $correct[0],
            "printed" => $this->printUx($correct)
        ];
    }

    private function printUx($correct)
    {
        return view(
            'vendor.rockhopsoftcom.nodes.225-rockhop-captcha',
            [
                "colorDesc" => $this->getColorDesc($correct[1]),
                "leftRight" => $this->getLeftRightImg($correct[2]),
                "count"     => $this->getCountImg($correct[3]),
                "imgIDs"    => $this->getImgIDs($correct[0]),
                "imgPath"   => $this->imgPath . 'rock-hop-captcha-'
            ]
        )->render();
    }

    private function getImgIDs($correct)
    {
        $done = [ $correct ];
        while (sizeof($done) < 9) {
            $optInd = random_int(0, (sizeof($this->imgOpts)-1));
            $rand = $this->imgOpts[$optInd][0];
            if (!in_array($rand, $done)) {
                $done[] = $rand;
            }
        }
        shuffle($done);
        return $done;
    }

    private function getColorDesc($color)
    {
        $colorDesc = $this->colorDesc[$color];
        $ind = random_int(0, (sizeof($colorDesc)-1));
        return $colorDesc[$ind];
    }

    private function getLeftRightImg($leftRight)
    {
        $lr = $this->leftRights[$leftRight];
        $ind = random_int(0, (sizeof($lr)-1));
        return $this->imgPath . 'rock-hop-captcha-lr-' . $lr[$ind] . '.jpg';
    }

    private function getCountImg($count)
    {
        $cnt = $this->counts[$count];
        $ind = random_int(0, (sizeof($cnt)-1));
        return $this->imgPath . 'rock-hop-captcha-cnt-' . $cnt[$ind] . '.jpg';
    }

}