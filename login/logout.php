<?php
session_start(); // Memulai pembukaan session
session_destroy(); // melakukan pembersihan session pada web app ini
header("location: ../login"); // redirecting ke halaman Login
