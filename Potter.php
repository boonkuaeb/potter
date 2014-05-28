<?php
class Potter
{
    private $book_selected_title = array();
    private $book_selected_total = 0;

    public function getPrice($book_list = array())
    {
        if (count($book_list) > 0) {
            $this->resetProperty();

            $output = 8;
            foreach ($book_list as $book_item) {
                if (!isset($this->book_selected_title[$book_item])) {
                    $this->book_selected_title[$book_item] = $book_item;
                }
                $this->book_selected_total = $this->book_selected_total + 1;
            }

            if ($this->book_selected_total > 1) {
                $output .= ' * ' . $this->book_selected_total;
            }

            switch (count($this->book_selected_title)) {
                case 2:
                    $output .= ' * 0.95';
                    break;
                case 3:
                    $output .= ' * 0.9';
                    break;
                case 4:
                    $output .= ' * 0.8';
                    break;
                case 5:
                    $output .= ' * 0.75';
                    break;
            }

        } else {
            $output = 0;
        }
        return (string)$output;
    }

    private function resetProperty()
    {
        $this->book_selected_title = array();
        $this->book_selected_total = 0;
    }

}