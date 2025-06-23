<?php

class PageController {
    public function dashboardView():void {
        Helpers::view("dashboard");
    }

    public function loginView() {
        Helpers::view("login");
    }
}