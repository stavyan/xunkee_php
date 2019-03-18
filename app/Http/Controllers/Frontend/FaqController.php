<?php

/*
 * This file is part of the Qsnh/meedu.
 *
 * (c) XiaoTeng <616896861@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Http\Controllers\Frontend;

use App\Models\FaqArticle;
use App\Models\FaqCategory;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function index()
    {
        $categories = FaqCategory::all();

        return v('frontend.faq.index', compact('categories'));
    }

    public function showCategoryPage($categoryId)
    {
        $category = FaqCategory::findOrFail($categoryId);
        $categories = FaqCategory::all();
        $articles = $category->articles()->orderByDesc('updated_at')->paginate(15);

        return v('frontend.faq.category_detail', compact('category', 'categories', 'articles'));
    }

    public function showArticlePage($articleId)
    {
        $article = FaqArticle::findOrFail($articleId);
        $categories = FaqCategory::all();

        return v('frontend.faq.article_detail', compact('article', 'categories'));
    }
}
