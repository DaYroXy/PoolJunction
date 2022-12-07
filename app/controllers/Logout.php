<?php

    class Logout extends Controller {
        // contains the new Model() for the specific model

        public function __construct() {
            // Load correct Model, call Controller->model(), whill resullts in new Post()

        }

        // Index Page
        public function index() {
            unset($_SESSION['user']);
            session_destroy();
            session_start();
            flash('logout_success', 'You have been logged out.', 'alert alert-danger text-center');
            redirect('login');
        }

    }