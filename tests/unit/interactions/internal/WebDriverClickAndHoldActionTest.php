<?php
// Copyright 2004-present Facebook. All Rights Reserved.
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//     http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

namespace Facebook\WebDriver;

class WebDriverClickAndHoldActionTest extends \PHPUnit_Framework_TestCase {
  /**
   * @type WebDriverClickAndHoldAction
   */
  private $webDriverClickAndHoldAction;

  private $webDriverMouse;
  private $locationProvider;

  public function setUp() {
    $this->webDriverMouse = $this->getMock('Facebook\WebDriver\WebDriverMouse');
    $this->locationProvider = $this->getMock('Facebook\WebDriver\WebDriverLocatable');
    $this->webDriverClickAndHoldAction = new WebDriverClickAndHoldAction(
      $this->webDriverMouse,
      $this->locationProvider
    );
  }

  public function testPerformSendsMouseDownCommand() {
    $coords = $this->getMockBuilder('Facebook\WebDriver\WebDriverCoordinates')->disableOriginalConstructor()->getMock();
    $this->webDriverMouse->expects($this->once())->method('mouseDown')->with($coords);
    $this->locationProvider->expects($this->once())->method('getCoordinates')->will($this->returnValue($coords));
    $this->webDriverClickAndHoldAction->perform();
  }
}
