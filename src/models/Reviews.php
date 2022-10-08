<?php


namespace app\src\models;


use app\core\Application;
use app\src\models\interfaces\IReviews;

class Reviews implements IReviews
{
    public function getReview($isb): bool|\PDOStatement
    {
        // TODO: Implement getReview() method.
        $strSQL = "SELECT review.review_id, review.book_id, review.description, review.customer_id, customer.nickname, customer.picture FROM `review`\n"

            . "INNER JOIN books ON books.book_id = review.book_id\n"

            . "INNER JOIN customer ON customer.customer_id = review.customer_id\n"

            . "WHERE review.book_id = $isb;";

        return Application::$database->getMySQL()->getIsConnection()->query($strSQL);
}