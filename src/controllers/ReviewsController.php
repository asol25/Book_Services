<?php


namespace app\src\controllers;


use app\core\Application;
use app\core\Controller;
use app\src\models\Reviews;
use JetBrains\PhpStorm\ArrayShape;
use Psr\Log\InvalidArgumentException;

class ReviewsController extends Controller
{
    public int $code;
    public mixed $message;

    public function __construct()
    {
        $this->code = 0;
        $this->message = null;
    }
    #[ArrayShape(["code" => "int", "message" => "mixed"])] public function GetModuleReviewController(): array
    {
        $reviews = null;
        try {
            $daoReviews = new Reviews();
            
            if (!isset($_GET['book_isb'])) {
                # code...
                throw new InvalidArgumentException("Error Miss Argument book_isb Request", 1);
                
            }
            if (isset($_GET['book_isb'])) {
                $reviews = $daoReviews->getReview($_GET['book_isb']);
            }

            if ($reviews->rowCount()) {
                $this->code = 1;
                $this->message = $reviews;
            }
        } catch (\PDOException | \InvalidArgumentException $exception) {
            $this->message = $exception;
        } finally {
            return Application::$response->setReturnMessage($this->code, $this->message);
        }
    }
}
