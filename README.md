# CakePHP SAE Blockchain


## Introduction

Ce projet a pour but de créer un site pédagogique pour les gens qui s'intéresse à la blockchain.
En créant un site web qui permet d'en apprendre plus sur la blockchain grâce à des actualités des articles ainsi que des quizz, pour se tester sur ses connaissances.

Il y a aussi une partie admin qui permet de gérer les articles, les actualités et les quizz.
Afin de pouvoir, ajouter, supprimer ou modifier les différents articles.

Ce projet est réalisé avec le framework cakephp 5.x dont vous retrouverez la documentation en dessous pour le tester et le modifier.

## Attention

Certains fichiers pour des raisons de sécurité ne sont pas présents dans le GIT.
Nous vous conseillons d'étudier la documentation de cakephp pour comprendre comment fonctionne le framework et comment créer le fichier manquant.

![Build Status](https://github.com/cakephp/app/actions/workflows/ci.yml/badge.svg?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)
[![PHPStan](https://img.shields.io/badge/PHPStan-level%207-brightgreen.svg?style=flat-square)](https://github.com/phpstan/phpstan)

A skeleton for creating applications with [CakePHP](https://cakephp.org) 5.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Installation

1. Download [Composer](https://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `php composer.phar create-project --prefer-dist cakephp/app [app_name]`.

If Composer is installed globally, run

```bash
composer create-project --prefer-dist cakephp/app
```

In case you want to use a custom app dir name (e.g. `/myapp/`):

```bash
composer create-project --prefer-dist cakephp/app myapp
```

You can now either use your machine's webserver to view the default home page, or start
up the built-in webserver with:

```bash
bin/cake server -p 8765
```

Then visit `http://localhost:8765` to see the welcome page.

## Update

Since this skeleton is a starting point for your application and various files
would have been modified as per your needs, there isn't a way to provide
automated upgrades, so you have to do any updates manually.

## Configuration

Read and edit the environment specific `config/app_local.php` and set up the
`'Datasources'` and any other configuration relevant for your application.
Other environment agnostic settings can be changed in `config/app.php`.

## Layout

The app skeleton uses [Milligram](https://milligram.io/) (v1.3) minimalist CSS
framework by default. You can, however, replace it with any other library or
custom styles.
