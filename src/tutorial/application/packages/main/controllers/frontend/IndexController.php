<?php
/**
 * xenFramework (http://xenframework.com/)
 *
 * This file is part of the xenframework package.
 *
 * (c) Ismael Trascastro <itrascastro@xenframework.com>
 *
 * @link        http://github.com/xenframework for the canonical source repository
 * @copyright   Copyright (c) xenFramework. (http://xenframework.com)
 * @license     MIT License - http://en.wikipedia.org/wiki/MIT_License
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace main\controllers\frontend;

use main\models\entities\Product;
use xen\mvc\Controller;
use xen\mvc\view\Phtml;
use Doctrine\ORM\EntityManager;

class IndexController extends Controller
{
    /**
     * @var EntityManager
     */
    private $_em;

    public function setEm($_em)
    {
        $this->_em = $_em;
    }

    public function indexAction()
    {
        $product = new Product();
        $product->setName('pname');
        $product->setPrice(20);
        $product->setDescription('desc');

        $this->_em->persist($product);
        $this->_em->flush();

        $productsRepo = $this->_em->getRepository('main\\models\\entities\\Product');

        $products = $productsRepo->findAll();

        var_dump($products);


        $this->_layout->title           = 'xenFramework.com';
        $this->_layout->description     = 'Create your own Php MVC Framework from scratch';

        $partial = new Phtml('application/packages/main/views/partials/example.phtml', 10);

        if ($content = $this->_cache->get('application/packages/main/views/partials/example.phtml', 10))
        {
            $partial->setCachedContent($content);
        }
        else
        {
            // ...
            // complex code
            // ...

            $partial->complexQuery = 'complex3';

            // ...
            // more complex code
            // ...
        }

        $this->_view->addPartial('example', $partial);

        $this->render();
    }
} 