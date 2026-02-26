"use client";

import { Dropdown } from "react-bootstrap";
import Image from "next/image"; 

const Profile = () => {
  return (
    <>
      <Dropdown className="admin-profile">
        <Dropdown.Toggle className="d-xxl-flex align-items-center bg-transparent border-0 text-start p-0 cursor">
          <div className="flex-shrink-0">
            <Image
              className="rounded-circle wh-40 administrator"
              src="/images/administrator.jpg"
              alt="admin"
              width={40}
              height={40}
            />
          </div>

          <div className="flex-grow-1 ms-2">
            <div className="d-flex align-items-center justify-content-between">
              <div className="d-none d-xxl-block">
                <div className="d-flex align-content-center">
                  <h3>Olivia</h3>
                </div>
              </div>
            </div>
          </div>
        </Dropdown.Toggle>

        <Dropdown.Menu className="border-0 bg-white dropdown-menu-end">
          <div className="d-flex align-items-center info">
            <div className="flex-shrink-0">
              <Image
                className="rounded-circle wh-30 administrator"
                src="/images/administrator.jpg"
                alt="admin"
                width={30}
                height={30}
              />
            </div>
            <div className="flex-grow-1 ms-2">
              <h3 className="fw-medium">Olivia John</h3>
              <span className="fs-12">Marketing Manager</span>
            </div>
          </div>

          <ul className="admin-link ps-0 mb-0 list-unstyled">
            <li>
              <a
                className="dropdown-item d-flex align-items-center text-body"
                href="/my-profile/"
              >
                <i className="material-symbols-outlined">account_circle</i>
                <span className="ms-2">My Profile</span>
              </a>
            </li>

            <li>
              <a
                className="dropdown-item d-flex align-items-center text-body"
                href="/apps/chat/"
              >
                <i className="material-symbols-outlined">chat</i>
                <span className="ms-2">Messages</span>
              </a>
            </li>

            <li>
              <a
                className="dropdown-item d-flex align-items-center text-body"
                href="/apps/to-do-list/"
              >
                <i className="material-symbols-outlined">
                  format_list_bulleted
                </i>
                <span className="ms-2">My Task</span>
              </a>
            </li>

            <li>
              <a
                className="dropdown-item d-flex align-items-center text-body"
                href="/ecommerce/checkout/"
              >
                <i className="material-symbols-outlined">credit_card</i>
                <span className="ms-2">Billing</span>
              </a>
            </li>
          </ul>

          <ul className="admin-link ps-0 mb-0 list-unstyled">
            <li>
              <a
                className="dropdown-item d-flex align-items-center text-body"
                href="/settings/account-settings/"
              >
                <i className="material-symbols-outlined">settings</i>
                <span className="ms-2">Settings</span>
              </a>
            </li>

            <li>
              <a
                className="dropdown-item d-flex align-items-center text-body"
                href="/helpdesk/tickets/"
              >
                <i className="material-symbols-outlined">support</i>
                <span className="ms-2">Support</span>
              </a>
            </li>

            <li>
              <a
                className="dropdown-item d-flex align-items-center text-body"
                href="/authentication/lock-screen/"
              >
                <i className="material-symbols-outlined">lock</i>
                <span className="ms-2">Lock Screen</span>
              </a>
            </li>

            <li>
              <a
                className="dropdown-item d-flex align-items-center text-body"
                href="/authentication/logout/"
              >
                <i className="material-symbols-outlined">logout</i>
                <span className="ms-2">Logout</span>
              </a>
            </li>
          </ul>
        </Dropdown.Menu>
      </Dropdown>
    </>
  );
};

export default Profile;
