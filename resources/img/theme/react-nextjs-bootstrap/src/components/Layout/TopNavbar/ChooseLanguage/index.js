"use client";

import { Dropdown } from "react-bootstrap";
import Image from "next/image";

const ChooseLanguage = () => {
  return (
    <>
      <Dropdown className="dropdown notifications language">
        <Dropdown.Toggle 
          variant="secondary" 
          id="dropdown-basic"
          className="border-0 p-0 position-relative"
        > 
          <i className="material-symbols-outlined">
            translate
          </i>
        </Dropdown.Toggle>

        <Dropdown.Menu className="dropdown-menu dropdown-lg p-0 border-0 dropdown-menu-end">
          <span className="fw-semibold fs-15 text-secondary title">
            Choose Language
          </span>
          <div className="max-h-275">
            <div className="notification-menu">
              <Dropdown.Item
                href="#"
                className="dropdown-item"
              >
                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0">
                    <Image
                      src="/images/usa.svg"
                      className="wh-30 rounded-circle"
                      alt="united-states"
                      width={30}
                      height={30}
                    />
                  </div>
                  <div className="flex-grow-1 ms-2">
                    <span className="text-secondary fw-medium fs-14">
                      English
                    </span>
                  </div>
                </div>
              </Dropdown.Item>
            </div>

            <div className="notification-menu">
              <Dropdown.Item
                href="#"
                className="dropdown-item"
              >
                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0">
                    <Image
                      src="/images/canada.svg"
                      className="wh-30 rounded-circle"
                      alt="spain"
                      width={30}
                      height={30}
                    />
                  </div>
                  <div className="flex-grow-1 ms-2">
                    <span className="text-secondary fw-medium fs-14">
                      Canada
                    </span>
                  </div>
                </div>
              </Dropdown.Item>
            </div>

            <div className="notification-menu">
              <Dropdown.Item
                href="#"
                className="dropdown-item"
              >
                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0">
                    <Image
                      src="/images/germany.svg"
                      className="wh-30 rounded-circle"
                      alt="spain"
                      width={30}
                      height={30}
                    />
                  </div>
                  <div className="flex-grow-1 ms-2">
                    <span className="text-secondary fw-medium fs-14">
                      Germany
                    </span>
                  </div>
                </div>
              </Dropdown.Item>
            </div>

            <div className="notification-menu">
              <Dropdown.Item
                href="#"
                className="dropdown-item"
              >
                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0">
                    <Image
                      src="/images/portugal.svg"
                      className="wh-30 rounded-circle"
                      alt="portugal"
                      width={30}
                      height={30}
                    />
                  </div>
                  <div className="flex-grow-1 ms-2">
                    <span className="text-secondary fw-medium fs-14">
                      Portugal
                    </span>
                  </div>
                </div>
              </Dropdown.Item>
            </div>

            <div className="notification-menu mb-0">
              <Dropdown.Item
                href="#"
                className="dropdown-item"
              >
                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0">
                    <Image
                      src="/images/spain.svg"
                      className="wh-30 rounded-circle"
                      alt="spain"
                      width={30}
                      height={30}
                    />
                  </div>
                  <div className="flex-grow-1 ms-2">
                    <span className="text-secondary fw-medium fs-14">
                      Spain
                    </span>
                  </div>
                </div>
              </Dropdown.Item>
            </div>
          </div>
        </Dropdown.Menu>
      </Dropdown>
    </>
  )
}

export default ChooseLanguage;