<?php
use Glued\Calendar\Controllers\CalendarController;
use Glued\Core\Middleware\RedirectGuests;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteCollectorProxy;

// Define the app routes.
$app->group('/calendar', function (RouteCollectorProxy $group) {
    $group->get ('/browse', CalendarController::class)->setName('calendar.browse.web'); 
    $group->get ('/manage', CalendarController::class)->setName('calendar.manage.web'); 
})->add(RedirectGuests::class);

/*
t_store_opportunities
t_store_offers
t_store_orders
t_store_cart
t_store_invoices
t_store_disputes

t_calendar_uris
t_worklog_items
t_mail_accounts
t_mail_box
t_mail_cards
t_mail_attachments

t_spider_subscriptions
t_spider_data
t_spider_events

out[$date][$eventid] = $event[data]

https://podio.github.io/jquery-mentions-input/
https://github.com/zurb/tribute
*/




