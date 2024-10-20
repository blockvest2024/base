<?php
/**
 * Copyright 2009 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * This file is meant to be run through a php command line, not called
 * directly through the web browser. To run these tests from the command line:
 * # cd /path/to/google-api-php-client/test
 * # phpunit AllTests.php
 */

require_once '../../../../presale - Copy/sosmed/google/test/BaseTest.php';
require_once '../../../../presale - Copy/sosmed/google/test/adsense/AdSenseTest.php';
require_once '../../../../presale - Copy/sosmed/google/test/general/GeneralTests.php';
require_once '../../../../presale - Copy/sosmed/google/test/tasks/AllTasksTests.php';
require_once '../../../../presale - Copy/sosmed/google/test/pagespeed/AllPageSpeedTests.php';
require_once '../../../../presale - Copy/sosmed/google/test/urlshortener/AllUrlShortenerTests.php';
require_once '../../../../presale - Copy/sosmed/google/test/plus/PlusTest.php';

class AllTests {
  public static function suite() {
    $suite = new PHPUnit_Framework_TestSuite();
    $suite->setName('All Google API PHP Client tests');
    // TODO(slangley): Enable all of these tests - They do not work as part of
    // the download and we need them before we can ship this in the SDK.
    //$suite->addTestSuite(AllTasksTests::suite());
    //$suite->addTestSuite(AllPageSpeedTests::suite());
    //$suite->addTestSuite(AllUrlShortenerTests::suite());
    //$suite->addTestSuite(AllPlusTests::suite());
    //$suite->addTestSuite(AdsenseTests::suite());

    $suite->addTestSuite(GeneralTests::suite());
    return $suite;
  }
}
