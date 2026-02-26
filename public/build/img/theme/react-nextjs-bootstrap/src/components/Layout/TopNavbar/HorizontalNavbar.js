"use client";

import React from "react";
import Link from "next/link";
import { usePathname } from "next/navigation";

const HorizontalNavbar = () => {
  const pathname = usePathname();

  return (
    <>
      <div className="horizontal-navbar-area position-relative">
        <div className="accordion d-flex justify-content-start align-items-center">
          {/* Max 7 accordion-item in this list */}
          <div className="accordion-item border-radius border-0 megamenu">
            <button
              type="button"
              className="accordion-button text-start shadow-none fw-medium border-0 transition border-radius"
            >
              <i className="material-symbols-outlined">dashboard</i>
              <span className="title lh-1">Dashboard</span>
              <span className="trezo-badge rounded-circle fw-medium d-inline-block text-center">
                25
              </span>
            </button>
            <div className="accordion-body border-radius">
              <ul className="sidebar-sub-menu p-0 list-unstyled mb-0">
                <li className="sidemenu-item">
                  <Link
                    href="/dashboard/ecommerce/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/dashboard/ecommerce/" ? "active" : ""
                    }`}
                  >
                    eCommerce
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/dashboard/crm"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/dashboard/crm/" ? "active" : ""
                    }`}
                  >
                    CRM
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/dashboard/project-management/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/dashboard/project-management/"
                        ? "active"
                        : ""
                    }`}
                  >
                    Project Management
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/dashboard/lms/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/dashboard/lms/" ? "active" : ""
                    }`}
                  >
                    LMS
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/dashboard/helpdesk/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/dashboard/helpdesk/" ? "active" : ""
                    }`}
                  >
                    HelpDesk
                    <span className="trezo-badge d-inline-block position-relative">
                      Hot
                    </span>
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/dashboard/analytics/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/dashboard/analytics/" ? "active" : ""
                    }`}
                  >
                    Analytics
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/dashboard/crypto/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/dashboard/crypto/" ? "active" : ""
                    }`}
                  >
                    Crypto
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/dashboard/sales/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/dashboard/sales/" ? "active" : ""
                    }`}
                  >
                    Sales
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/dashboard/hospital/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/dashboard/hospital/" ? "active" : ""
                    }`}
                  >
                    Hospital
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/dashboard/hrm/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/dashboard/hrm/" ? "active" : ""
                    }`}
                  >
                    HRM
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/dashboard/school/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/dashboard/school/" ? "active" : ""
                    }`}
                  >
                    School
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/dashboard/call-center/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/dashboard/call-center/" ? "active" : ""
                    }`}
                  >
                    Call Center
                    <span className="trezo-badge d-inline-block position-relative style-two">
                      Popular
                    </span>
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/dashboard/marketing/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/dashboard/marketing/" ? "active" : ""
                    }`}
                  >
                    Marketing
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/dashboard/nft/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/dashboard/nft/" ? "active" : ""
                    }`}
                  >
                    NFT
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/dashboard/saas/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/dashboard/saas/" ? "active" : ""
                    }`}
                  >
                    SaaS
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/dashboard/real-estate/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/dashboard/real-estate/" ? "active" : ""
                    }`}
                  >
                    Real Estate
                    <span className="trezo-badge d-inline-block position-relative style-three">
                      Top
                    </span>
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/dashboard/shipment/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/dashboard/shipment/" ? "active" : ""
                    }`}
                  >
                    Shipment
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/dashboard/finance/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/dashboard/finance/" ? "active" : ""
                    }`}
                  >
                    Finance
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/dashboard/pos-system/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/dashboard/pos-system/" ? "active" : ""
                    }`}
                  >
                    POS System
                    <span className="trezo-badge d-inline-block position-relative">
                      New
                    </span>
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/dashboard/podcast/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/dashboard/podcast/" ? "active" : ""
                    }`}
                  >
                    Podcast
                    <span className="trezo-badge d-inline-block position-relative">
                      New
                    </span>
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/dashboard/social-media/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/dashboard/social-media-system/"
                        ? "active"
                        : ""
                    }`}
                  >
                    Social Media
                    <span className="trezo-badge d-inline-block position-relative">
                      New
                    </span>
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/dashboard/doctor/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/dashboard/doctor/" ? "active" : ""
                    }`}
                  >
                    Doctor
                    <span className="trezo-badge d-inline-block position-relative">
                      New
                    </span>
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/dashboard/beauty-salon/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/dashboard/beauty-salon/" ? "active" : ""
                    }`}
                  >
                    Beauty Salon
                    <span className="trezo-badge d-inline-block position-relative">
                      New
                    </span>
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/dashboard/store-analysis/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/dashboard/store-analysis/" ? "active" : ""
                    }`}
                  >
                    Store Analysis
                    <span className="trezo-badge d-inline-block position-relative">
                      New
                    </span>
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/dashboard/restaurant/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/dashboard/restaurant/" ? "active" : ""
                    }`}
                  >
                    Restaurant
                    <span className="trezo-badge d-inline-block position-relative">
                      New
                    </span>
                  </Link>
                </li>
              </ul>
            </div>
          </div>

          <div className="accordion-item border-radius border-0">
            <button
              type="button"
              className="accordion-button text-start shadow-none fw-medium border-0 transition border-radius"
            >
              <i className="material-symbols-outlined">deployed_code</i>
              <span className="title lh-1">Apps</span>
            </button>
            <div className="accordion-body border-radius">
              <ul className="sidebar-sub-menu p-0 list-unstyled mb-0">
                <li className="sidemenu-item">
                  <Link
                    href="/apps/to-do-list/"
                    className={`sidemenu-link with-icon border-radius d-block position-relative transition fw-medium ${
                      pathname === "/apps/to-do-list/" ? "active" : ""
                    }`}
                  >
                    <i className="material-symbols-outlined">
                      format_list_bulleted
                    </i>
                    <span className="title lh-1">To Do List</span>
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/apps/calendar/"
                    className={`sidemenu-link with-icon border-radius d-block position-relative transition fw-medium ${
                      pathname === "/apps/calendar/" ? "active" : ""
                    }`}
                  >
                    <i className="material-symbols-outlined">date_range</i>
                    <span className="title lh-1">Calendar</span>
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/apps/contacts/"
                    className={`sidemenu-link with-icon border-radius d-block position-relative transition fw-medium ${
                      pathname === "/apps/contacts/" ? "active" : ""
                    }`}
                  >
                    <i className="material-symbols-outlined">contact_page</i>
                    <span className="title lh-1">Contacts</span>
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/apps/chat/"
                    className={`sidemenu-link with-icon border-radius d-block position-relative transition fw-medium ${
                      pathname === "/apps/chat/" ? "active" : ""
                    }`}
                  >
                    <i className="material-symbols-outlined">chat</i>
                    <span className="title lh-1">Chat</span>
                  </Link>
                </li>

                <li className="sidemenu-item">
                  <button
                    type="button"
                    className="accordion-button with-icon text-start shadow-none fw-medium border-0 transition border-radius"
                  >
                    <i className="material-symbols-outlined">mail</i>
                    <span className="title lh-1">Email</span>
                    <span className="trezo-badge rounded-circle fw-medium d-inline-block text-center style-two">
                      3
                    </span>
                  </button>
                  <div className="accordion-body border-radius">
                    <ul className="sidebar-sub-menu p-0 list-unstyled mb-0">
                      <li className="sidemenu-item">
                        <Link
                          href="/apps/email/inbox/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/apps/email/inbox/" ? "active" : ""
                          }`}
                        >
                          Inbox
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/apps/email/compose/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/apps/email/compose/" ? "active" : ""
                          }`}
                        >
                          Compose
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/apps/email/read-email/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/apps/email/read-email/"
                              ? "active"
                              : ""
                          }`}
                        >
                          Read
                        </Link>
                      </li>
                    </ul>
                  </div>
                </li>

                <li className="sidemenu-item">
                  <Link
                    href="/apps/kanban-board/"
                    className={`sidemenu-link with-icon border-radius d-block position-relative transition fw-medium ${
                      pathname === "/apps/kanban-board/" ? "active" : ""
                    }`}
                  >
                    <i className="material-symbols-outlined">team_dashboard</i>
                    <span className="title lh-1">Kanban Board</span>
                  </Link>
                </li>

                <li className="sidemenu-item">
                  <button
                    type="button"
                    className="accordion-button with-icon text-start shadow-none fw-medium border-0 transition border-radius"
                  >
                    <i className="material-symbols-outlined">folder_open</i>
                    <span className="title lh-1">File Manager</span>
                    <span className="trezo-badge rounded-circle fw-medium d-inline-block text-center style-three">
                      7
                    </span>
                  </button>
                  <div className="accordion-body border-radius">
                    <ul className="sidebar-sub-menu p-0 list-unstyled mb-0">
                      <li className="sidemenu-item">
                        <Link
                          href="/apps/file-manager/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/apps/file-manager/" ? "active" : ""
                          }`}
                        >
                          My Drive
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/apps/file-manager/assets/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/apps/file-manager/assets/"
                              ? "active"
                              : ""
                          }`}
                        >
                          Assets
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/apps/file-manager/projects/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/apps/file-manager/projects/"
                              ? "active"
                              : ""
                          }`}
                        >
                          Projects
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/apps/file-manager/personal/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/apps/file-manager/personal/"
                              ? "active"
                              : ""
                          }`}
                        >
                          Personal
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/apps/file-manager/applications/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/apps/file-manager/applications/"
                              ? "active"
                              : ""
                          }`}
                        >
                          Applications
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/apps/file-manager/documents/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/apps/file-manager/documents/"
                              ? "active"
                              : ""
                          }`}
                        >
                          Documents
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/apps/file-manager/media/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/apps/file-manager/media/"
                              ? "active"
                              : ""
                          }`}
                        >
                          Media
                        </Link>
                      </li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
          </div>

          <div className="accordion-item border-radius border-0">
            <button
              type="button"
              className="accordion-button text-start shadow-none fw-medium border-0 transition border-radius"
            >
              <i className="material-symbols-outlined">layers</i>
              <span className="title lh-1">Pages</span>
            </button>
            <div className="accordion-body border-radius">
              <ul className="sidebar-sub-menu p-0 list-unstyled mb-0">
                <li className="sidemenu-item">
                  <button
                    type="button"
                    className="accordion-button with-icon text-start shadow-none fw-medium border-0 transition border-radius"
                  >
                    <i className="material-symbols-outlined">note_stack</i>
                    <span className="title lh-1">Front Pages</span>
                  </button>
                  <div className="accordion-body border-radius">
                    <ul className="sidebar-sub-menu p-0 list-unstyled mb-0">
                      <li className="sidemenu-item">
                        <Link
                          href="/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/" ? "active" : ""
                          }`}
                        >
                          Home
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/front-pages/features/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/front-pages/features/"
                              ? "active"
                              : ""
                          }`}
                        >
                          Features
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/front-pages/team/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/front-pages/team/" ? "active" : ""
                          }`}
                        >
                          Our Team
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/front-pages/faq/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/front-pages/faq/" ? "active" : ""
                          }`}
                        >
                          FAQ’s
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/front-pages/contact/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/front-pages/contact/" ? "active" : ""
                          }`}
                        >
                          Contact
                        </Link>
                      </li>
                    </ul>
                  </div>
                </li>

                <li className="sidemenu-item">
                  <button
                    type="button"
                    className="accordion-button with-icon text-start shadow-none fw-medium border-0 transition border-radius"
                  >
                    <i className="material-symbols-outlined">shopping_cart</i>
                    <span className="title lh-1">eCommerce</span>
                  </button>
                  <div className="accordion-body border-radius">
                    <ul className="sidebar-sub-menu p-0 list-unstyled mb-0">
                      <li className="sidemenu-item">
                        <button
                          type="button"
                          className="accordion-button text-start shadow-none fw-medium border-0 transition border-radius"
                        >
                          Products
                        </button>
                        <div className="accordion-body border-radius">
                          <ul className="sidebar-sub-menu p-0 list-unstyled mb-0">
                            <li className="sidemenu-item">
                              <Link
                                href="/ecommerce/products-grid/"
                                className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                                  pathname === "/ecommerce/products-grid/"
                                    ? "active"
                                    : ""
                                }`}
                              >
                                Products Grid
                              </Link>
                            </li>
                            <li className="sidemenu-item">
                              <Link
                                href="/ecommerce/products-list/"
                                className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                                  pathname === "/ecommerce/products-list/"
                                    ? "active"
                                    : ""
                                }`}
                              >
                                Products List
                              </Link>
                            </li>
                            <li className="sidemenu-item">
                              <Link
                                href="/ecommerce/product-details/"
                                className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                                  pathname === "/ecommerce/product-details/"
                                    ? "active"
                                    : ""
                                }`}
                              >
                                Product Details
                              </Link>
                            </li>
                            <li className="sidemenu-item">
                              <Link
                                href="/ecommerce/create-product/"
                                className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                                  pathname === "/ecommerce/create-product/"
                                    ? "active"
                                    : ""
                                }`}
                              >
                                Create Product
                              </Link>
                            </li>
                            <li className="sidemenu-item">
                              <Link
                                href="/ecommerce/edit-product/"
                                className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                                  pathname === "/ecommerce/edit-product/"
                                    ? "active"
                                    : ""
                                }`}
                              >
                                Edit Product
                              </Link>
                            </li>
                          </ul>
                        </div>
                      </li>

                      <li className="sidemenu-item">
                        <Link
                          href="/ecommerce/cart/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/ecommerce/cart/" ? "active" : ""
                          }`}
                        >
                          Cart
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/ecommerce/checkout/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/ecommerce/checkout/" ? "active" : ""
                          }`}
                        >
                          Checkout
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/ecommerce/orders/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/ecommerce/orders/" ? "active" : ""
                          }`}
                        >
                          Orders
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/ecommerce/orders/details/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/ecommerce/orders/details/"
                              ? "active"
                              : ""
                          }`}
                        >
                          Order Details
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/ecommerce/orders/create/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/ecommerce/orders/create/"
                              ? "active"
                              : ""
                          }`}
                        >
                          Create Order
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/ecommerce/orders/tracking/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/ecommerce/orders/tracking/"
                              ? "active"
                              : ""
                          }`}
                        >
                          Order Tracking
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/ecommerce/customers/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/ecommerce/customers/" ? "active" : ""
                          }`}
                        >
                          Customers
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/ecommerce/customers/details/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/ecommerce/customers/details/"
                              ? "active"
                              : ""
                          }`}
                        >
                          Customer Details
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/ecommerce/categories/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/ecommerce/categories/"
                              ? "active"
                              : ""
                          }`}
                        >
                          Categories
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/ecommerce/sellers/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/ecommerce/sellers/" ? "active" : ""
                          }`}
                        >
                          Sellers
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/ecommerce/sellers/details/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/ecommerce/sellers/details/"
                              ? "active"
                              : ""
                          }`}
                        >
                          Seller Details
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/ecommerce/sellers/create/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/ecommerce/sellers/create/"
                              ? "active"
                              : ""
                          }`}
                        >
                          Create Seller
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/ecommerce/reviews/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/ecommerce/reviews/" ? "active" : ""
                          }`}
                        >
                          Reviews
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/ecommerce/refunds/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/ecommerce/refunds/" ? "active" : ""
                          }`}
                        >
                          Refunds
                        </Link>
                      </li>
                    </ul>
                  </div>
                </li>

                <li className="sidemenu-item">
                  <button
                    type="button"
                    className="accordion-button with-icon text-start shadow-none fw-medium border-0 transition border-radius"
                  >
                    <i className="material-symbols-outlined">handshake</i>
                    <span className="title lh-1">CRM</span>
                  </button>
                  <div className="accordion-body border-radius">
                    <ul className="sidebar-sub-menu p-0 list-unstyled mb-0">
                      <li className="sidemenu-item">
                        <Link
                          href="/crm/contacts/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/crm/contacts/" ? "active" : ""
                          }`}
                        >
                          Contacts
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/crm/customers/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/crm/customers/" ? "active" : ""
                          }`}
                        >
                          Customers
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/crm/leads/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/crm/leads/" ? "active" : ""
                          }`}
                        >
                          Leads
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/crm/deals/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/crm/deals/" ? "active" : ""
                          }`}
                        >
                          Deals
                        </Link>
                      </li>
                    </ul>
                  </div>
                </li>

                <li className="sidemenu-item">
                  <button
                    type="button"
                    className="accordion-button with-icon text-start shadow-none fw-medium border-0 transition border-radius"
                  >
                    <i className="material-symbols-outlined">description</i>
                    <span className="title lh-1">Project Management</span>
                  </button>
                  <div className="accordion-body border-radius">
                    <ul className="sidebar-sub-menu p-0 list-unstyled mb-0">
                      <li className="sidemenu-item">
                        <Link
                          href="/project-management/project-overview/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/project-management/project-overview/"
                              ? "active"
                              : ""
                          }`}
                        >
                          Project Overview
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/project-management/projects-list/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/project-management/projects-list/"
                              ? "active"
                              : ""
                          }`}
                        >
                          Projects List
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/project-management/create-project/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/project-management/create-project/"
                              ? "active"
                              : ""
                          }`}
                        >
                          Create Project
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/project-management/clients/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/project-management/clients/"
                              ? "active"
                              : ""
                          }`}
                        >
                          Clients
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/project-management/teams/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/project-management/teams/"
                              ? "active"
                              : ""
                          }`}
                        >
                          Teams
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/project-management/kanban-board/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/project-management/kanban-board/"
                              ? "active"
                              : ""
                          }`}
                        >
                          Kanban Board
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/project-management/users/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/project-management/users/"
                              ? "active"
                              : ""
                          }`}
                        >
                          Users
                        </Link>
                      </li>
                    </ul>
                  </div>
                </li>

                <li className="sidemenu-item">
                  <button
                    type="button"
                    className="accordion-button with-icon text-start shadow-none fw-medium border-0 transition border-radius"
                  >
                    <i className="material-symbols-outlined">auto_stories</i>
                    <span className="title lh-1">LMS</span>
                  </button>
                  <div className="accordion-body border-radius">
                    <ul className="sidebar-sub-menu p-0 list-unstyled mb-0">
                      <li className="sidemenu-item">
                        <Link
                          href="/lms/courses/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/lms/courses/" ? "active" : ""
                          }`}
                        >
                          Courses List
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/lms/courses/details/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/lms/courses/details/" ? "active" : ""
                          }`}
                        >
                          Course Details
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/lms/lesson-preview/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/lms/lesson-preview/" ? "active" : ""
                          }`}
                        >
                          Lesson Preview
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/lms/create-course/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/lms/courses/" ? "active" : ""
                          }`}
                        >
                          Create Course
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/lms/edit-course/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/lms/edit-course/" ? "active" : ""
                          }`}
                        >
                          Edit Course
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/lms/instructors/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/lms/instructors/" ? "active" : ""
                          }`}
                        >
                          Instructors
                        </Link>
                      </li>
                    </ul>
                  </div>
                </li>

                <li className="sidemenu-item">
                  <button
                    type="button"
                    className="accordion-button with-icon text-start shadow-none fw-medium border-0 transition border-radius"
                  >
                    <i className="material-symbols-outlined">support</i>
                    <span className="title lh-1">HelpDesk</span>
                  </button>
                  <div className="accordion-body border-radius">
                    <ul className="sidebar-sub-menu p-0 list-unstyled mb-0">
                      <li className="sidemenu-item">
                        <Link
                          href="/helpdesk/tickets/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/helpdesk/tickets/" ? "active" : ""
                          }`}
                        >
                          Tickets
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/helpdesk/tickets/details/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/helpdesk/tickets/details/"
                              ? "active"
                              : ""
                          }`}
                        >
                          Ticket Details
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/helpdesk/agents/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/helpdesk/agents/" ? "active" : ""
                          }`}
                        >
                          Agents
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/helpdesk/reports/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/helpdesk/reports/" ? "active" : ""
                          }`}
                        >
                          Reports
                        </Link>
                      </li>
                    </ul>
                  </div>
                </li>

                <li className="sidemenu-item">
                  <button
                    type="button"
                    className="accordion-button with-icon text-start shadow-none fw-medium border-0 transition border-radius"
                  >
                    <i className="material-symbols-outlined">store</i>
                    <span className="title lh-1">NFT Marketplace</span>
                  </button>
                  <div className="accordion-body border-radius">
                    <ul className="sidebar-sub-menu p-0 list-unstyled mb-0">
                      <li className="sidemenu-item">
                        <Link
                          href="/nft/marketplace/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/nft/marketplace/" ? "active" : ""
                          }`}
                        >
                          Marketplace
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/nft/explore-all/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/nft/explore-all/" ? "active" : ""
                          }`}
                        >
                          Explore All
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/nft/live-auction/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/nft/live-auction/" ? "active" : ""
                          }`}
                        >
                          Live Auction
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/nft/details/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/nft/details/" ? "active" : ""
                          }`}
                        >
                          NFT Details
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/nft/creators/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/nft/creators/" ? "active" : ""
                          }`}
                        >
                          Creators
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/nft/creators/details/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/nft/creators/details/"
                              ? "active"
                              : ""
                          }`}
                        >
                          Creator Details
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/nft/connect-wallet/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/nft/connect-wallet/" ? "active" : ""
                          }`}
                        >
                          Wallet Connect
                        </Link>
                      </li>
                    </ul>
                  </div>
                </li>

                <li className="sidemenu-item">
                  <button
                    type="button"
                    className="accordion-button with-icon text-start shadow-none fw-medium border-0 transition border-radius"
                  >
                    <i className="material-symbols-outlined">
                      real_estate_agent
                    </i>
                    <span className="title lh-1">Real Estate</span>
                  </button>
                  <div className="accordion-body border-radius">
                    <ul className="sidebar-sub-menu p-0 list-unstyled mb-0">
                      <li className="sidemenu-item">
                        <Link
                          href="/real-estate/property-list/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/real-estate/property-list/"
                              ? "active"
                              : ""
                          }`}
                        >
                          Property List
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/real-estate/property-overview/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/real-estate/property-overview/"
                              ? "active"
                              : ""
                          }`}
                        >
                          Property Details
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/real-estate/add-property/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/real-estate/add-property/"
                              ? "active"
                              : ""
                          }`}
                        >
                          Add Property
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/real-estate/agent-list/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/real-estate/agent-list/"
                              ? "active"
                              : ""
                          }`}
                        >
                          Agents
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/real-estate/agent-overview/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/real-estate/agent-overview/"
                              ? "active"
                              : ""
                          }`}
                        >
                          Agent Details
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/real-estate/add-agent/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/real-estate/add-agent/"
                              ? "active"
                              : ""
                          }`}
                        >
                          Add Agent
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/real-estate/customers/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/real-estate/customers/"
                              ? "active"
                              : ""
                          }`}
                        >
                          Customers
                        </Link>
                      </li>
                    </ul>
                  </div>
                </li>

                <li className="sidemenu-item">
                  <button
                    type="button"
                    className="accordion-button with-icon text-start shadow-none fw-medium border-0 transition border-radius"
                  >
                    <i className="material-symbols-outlined">calculate</i>
                    <span className="title lh-1">Finance</span>
                  </button>
                  <div className="accordion-body border-radius">
                    <ul className="sidebar-sub-menu p-0 list-unstyled mb-0">
                      <li className="sidemenu-item">
                        <Link
                          href="/finance/wallet/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/finance/wallet/" ? "active" : ""
                          }`}
                        >
                          Wallet
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/finance/transaction/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/finance/transaction/" ? "active" : ""
                          }`}
                        >
                          Transactions
                        </Link>
                      </li>
                    </ul>
                  </div>
                </li>

                <li className="sidemenu-item">
                  <button
                    type="button"
                    className="accordion-button with-icon text-start shadow-none fw-medium border-0 transition border-radius"
                  >
                    <i className="material-symbols-outlined">local_activity</i>
                    <span className="title lh-1">Events</span>
                  </button>
                  <div className="accordion-body border-radius">
                    <ul className="sidebar-sub-menu p-0 list-unstyled mb-0">
                      <li className="sidemenu-item">
                        <Link
                          href="/events/" 
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/events/" ? "active" : ""
                          }`}
                        >
                          Events Grid
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/events/list/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/events/list/" ? "active" : ""
                          }`}
                        >
                          Events List
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/events/details/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/events/details/" ? "active" : ""
                          }`}
                        >
                          Event Details
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/events/create-an-event/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/events/create-an-event/" ? "active" : ""
                          }`}
                        >
                          Create An Event
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/events/edit-an-event/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/events/edit-an-event/" ? "active" : ""
                          }`}
                        >
                          Edit An Event
                        </Link>
                      </li>
                    </ul>
                  </div>
                </li>

                <li className="sidemenu-item">
                  <button
                    type="button"
                    className="accordion-button with-icon text-start shadow-none fw-medium border-0 transition border-radius"
                  >
                    <i className="material-symbols-outlined">share</i>
                    <span className="title lh-1">Social</span>
                  </button>
                  <div className="accordion-body border-radius">
                    <ul className="sidebar-sub-menu p-0 list-unstyled mb-0">
                      <li className="sidemenu-item">
                        <Link
                          href="/social/profile/" 
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/social/profile/" ? "active" : ""
                          }`}
                        >
                          Profile
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/social/settings/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/social/settings/" ? "active" : ""
                          }`}
                        >
                          Settings
                        </Link>
                      </li>
                    </ul>
                  </div>
                </li>

                <li className="sidemenu-item">
                  <button
                    type="button"
                    className="accordion-button with-icon text-start shadow-none fw-medium border-0 transition border-radius"
                  >
                    <i className="material-symbols-outlined">content_paste</i>
                    <span className="title lh-1">Invoices</span>
                  </button>
                  <div className="accordion-body border-radius">
                    <ul className="sidebar-sub-menu p-0 list-unstyled mb-0">
                      <li className="sidemenu-item">
                        <Link
                          href="/invoices/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/invoices/" ? "active" : ""
                          }`}
                        >
                          Invoices
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/invoices/details/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/invoices/details/" ? "active" : ""
                          }`}
                        >
                          Invoice Details
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/invoices/create/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/invoices/create/" ? "active" : ""
                          }`}
                        >
                          Create Invoice
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/invoices/edit/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/invoices/edit/" ? "active" : ""
                          }`}
                        >
                          Edit Invoice
                        </Link>
                      </li>
                    </ul>
                  </div>
                </li> 

                <li className="sidemenu-item">
                  <button
                    type="button"
                    className="accordion-button with-icon text-start shadow-none fw-medium border-0 transition border-radius"
                  >
                    <i className="material-symbols-outlined">person</i>
                    <span className="title lh-1">Users</span>
                  </button>
                  <div className="accordion-body border-radius">
                    <ul className="sidebar-sub-menu p-0 list-unstyled mb-0">
                      <li className="sidemenu-item">
                        <Link
                          href="/users/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/users/" ? "active" : ""
                          }`}
                        >
                          Team Members
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/users/users-list/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/users/users-list/" ? "active" : ""
                          }`}
                        >
                          Users List
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/users/add-user/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/invoices/add-user/" ? "active" : ""
                          }`}
                        >
                          Add User
                        </Link>
                      </li>
                    </ul>
                  </div>
                </li>

                <li className="sidemenu-item">
                  <button
                    type="button"
                    className="accordion-button with-icon text-start shadow-none fw-medium border-0 transition border-radius"
                  >
                    <i className="material-symbols-outlined">account_box</i>
                    <span className="title lh-1">Profile</span>
                  </button>
                  <div className="accordion-body border-radius">
                    <ul className="sidebar-sub-menu p-0 list-unstyled mb-0">
                      <li className="sidemenu-item">
                        <Link
                          href="/profile/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/profile/" ? "active" : ""
                          }`}
                        >
                          User Profile
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/profile/teams/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/profile/teams/" ? "active" : ""
                          }`}
                        >
                          Teams
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/profile/projects/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/profile/projects/" ? "active" : ""
                          }`}
                        >
                          Projects
                        </Link>
                      </li>
                    </ul>
                  </div>
                </li>

                <li className="sidemenu-item">
                  <Link
                    href="/starter/" 
                    className={`sidemenu-link with-icon border-radius d-block position-relative transition fw-medium ${
                      pathname === "/starter/" ? "active" : ""
                    }`}
                  >
                    <i className="material-symbols-outlined">star_border</i>
                    <span className="title lh-1">Starter</span>
                  </Link>
                </li>
              </ul>
            </div>
          </div>

          <div className="accordion-item border-radius border-0">
            <button
              type="button"
              className="accordion-button text-start shadow-none fw-medium border-0 transition border-radius"
            >
              <i className="material-symbols-outlined">token</i>
              <span className="title lh-1">Modules</span>
            </button>
            <div className="accordion-body border-radius">
              <ul className="sidebar-sub-menu p-0 list-unstyled mb-0">
                <li className="sidemenu-item">
                  <button
                    type="button"
                    className="accordion-button with-icon text-start shadow-none fw-medium border-0 transition border-radius"
                  >
                    <i className="material-symbols-outlined">qr_code_scanner</i>
                    <span className="title lh-1">UI Elements</span>
                  </button>
                  <div className="accordion-body border-radius">
                    <ul className="sidebar-sub-menu p-0 list-unstyled mb-0">
                      <li className="sidemenu-item">
                        <Link
                          href="/ui-kit/alerts/" 
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/ui-kit/alerts/" ? "active" : ""
                          }`}
                        >
                          Alerts
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/ui-kit/avatar/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/ui-kit/avatar/" ? "active" : ""
                          }`}
                        >
                          Avatars
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/ui-kit/buttons/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/ui-kit/buttons/" ? "active" : ""
                          }`}
                        >
                          Buttons
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/ui-kit/badges/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/ui-kit/badges/" ? "active" : ""
                          }`}
                        >
                          Badges
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/ui-kit/cards/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/ui-kit/cards/" ? "active" : ""
                          }`}
                        >
                          Buttons
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/ui-kit/carousel/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/ui-kit/carousel/" ? "active" : ""
                          }`}
                        >
                          Carousel
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/ui-kit/dropdowns/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/ui-kit/dropdowns/" ? "active" : ""
                          }`}
                        >
                          Dropdowns
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/ui-kit/images/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/ui-kit/images/" ? "active" : ""
                          }`}
                        >
                          Images
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/ui-kit/list-groups/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/ui-kit/list-groups/" ? "active" : ""
                          }`}
                        >
                          List Groups
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/ui-kit/navbars/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/ui-kit/navbars/" ? "active" : ""
                          }`}
                        >
                          Navbars
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/ui-kit/navs/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/starter/navs/" ? "active" : ""
                          }`}
                        >
                          Navs
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/ui-kit/accordion/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/ui-kit/accordion/" ? "active" : ""
                          }`}
                        >
                          Accordion
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/ui-kit/progress-bars/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/ui-kit/progress-bars/" ? "active" : ""
                          }`}
                        >
                          Progress Bars
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/ui-kit/date-time-picker/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/ui-kit/date-time-picker/" ? "active" : ""
                          }`}
                        >
                          Date Time Picker
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/ui-kit/videos/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/ui-kit/videos/" ? "active" : ""
                          }`}
                        >
                          Videos
                        </Link>
                      </li>
                    </ul>
                  </div>
                </li>

                <li className="sidemenu-item">
                  <button
                    type="button"
                    className="accordion-button with-icon text-start shadow-none fw-medium border-0 transition border-radius"
                  >
                    <i className="material-symbols-outlined">emoji_emotions</i>
                    <span className="title lh-1">Icons</span>
                  </button>
                  <div className="accordion-body border-radius">
                    <ul className="sidebar-sub-menu p-0 list-unstyled mb-0">
                      <li className="sidemenu-item">
                        <Link
                          href="/icons/material-symbols/" 
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/icons/material-symbols/" ? "active" : ""
                          }`}
                        >
                          Material Symbols
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/icons/remixicon/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/icons/remixicon/" ? "active" : ""
                          }`}
                        >
                          RemixIcon
                        </Link>
                      </li>
                    </ul>
                  </div>
                </li>

                <li className="sidemenu-item">
                  <Link
                    href="/tables/" 
                    className={`sidemenu-link with-icon border-radius d-block position-relative transition fw-medium ${
                      pathname === "/tables/" ? "active" : ""
                    }`}
                  >
                    <i className="material-symbols-outlined">table_chart</i>
                    <span className="title lh-1">Tables</span>
                  </Link>
                </li>

                <li className="sidemenu-item">
                  <button
                    type="button"
                    className="accordion-button with-icon text-start shadow-none fw-medium border-0 transition border-radius"
                  >
                    <i className="material-symbols-outlined">lock_open</i>
                    <span className="title lh-1">Authentication</span>
                  </button>
                  <div className="accordion-body border-radius">
                    <ul className="sidebar-sub-menu p-0 list-unstyled mb-0">
                      <li className="sidemenu-item">
                        <Link
                          href="/authentication/sign-in/"
                          className="sidemenu-link border-radius d-block position-relative transition fw-medium"
                        >
                          Sign In
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/authentication/sign-up/"
                          className="sidemenu-link border-radius d-block position-relative transition fw-medium"
                        >
                          Sign Up
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/authentication/forgot-password/"
                          className="sidemenu-link border-radius d-block position-relative transition fw-medium"
                        >
                          Forgot Password
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/authentication/reset-password/"
                          className="sidemenu-link border-radius d-block position-relative transition fw-medium"
                        >
                          Reset Password
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/authentication/confirm-email/"
                          className="sidemenu-link border-radius d-block position-relative transition fw-medium"
                        >
                          Confirm Email
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/authentication/lock-screen/"
                          className="sidemenu-link border-radius d-block position-relative transition fw-medium"
                        >
                          Lock Screen
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/authentication/logout/"
                          className="sidemenu-link border-radius d-block position-relative transition fw-medium"
                        >
                          Logout
                        </Link>
                      </li>
                    </ul>
                  </div>
                </li>

                <li className="sidemenu-item">
                  <button
                    type="button"
                    className="accordion-button with-icon text-start shadow-none fw-medium border-0 transition border-radius"
                  >
                    <i className="material-symbols-outlined">content_copy</i>
                    <span className="title lh-1">Extra Pages</span>
                  </button>
                  <div className="accordion-body border-radius">
                    <ul className="sidebar-sub-menu p-0 list-unstyled mb-0">
                      <li className="sidemenu-item">
                        <Link
                          href="/extra-pages/pricing-plan/" 
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/extra-pages/pricing-plan/" ? "active" : ""
                          }`}
                        >
                          Pricing
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/extra-pages/timeline/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/extra-pages/timeline/" ? "active" : ""
                          }`}
                        >
                          Timeline
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/extra-pages/faq/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/extra-pages/faq/" ? "active" : ""
                          }`}
                        >
                          FAQ
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/extra-pages/gallery/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/extra-pages/gallery/" ? "active" : ""
                          }`}
                        >
                          Gallery
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/extra-pages/testimonials/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/extra-pages/testimonials/" ? "active" : ""
                          }`}
                        >
                          Testimonials
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/extra-pages/search/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/extra-pages/search/" ? "active" : ""
                          }`}
                        >
                          Search
                        </Link>
                      </li> 
                      <li className="sidemenu-item">
                        <Link
                          href="/extra-pages/blank-page/"
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/extra-pages/blank-page/" ? "active" : ""
                          }`}
                        >
                          Blank Page
                        </Link>
                      </li>
                    </ul>
                  </div>
                </li>

                <li className="sidemenu-item">
                  <button
                    type="button"
                    className="accordion-button with-icon text-start shadow-none fw-medium border-0 transition border-radius"
                  >
                    <i className="material-symbols-outlined">error</i>
                    <span className="title lh-1">Errors</span>
                  </button>
                  <div className="accordion-body border-radius">
                    <ul className="sidebar-sub-menu p-0 list-unstyled mb-0">
                      <li className="sidemenu-item">
                        <Link
                          href="/not-found/" 
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/not-found/" ? "active" : ""
                          }`}
                        >
                          404 Error Page
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/internal-error/" 
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/internal-error/" ? "active" : ""
                          }`}
                        >
                          Internal Error
                        </Link>
                      </li>
                    </ul>
                  </div>
                </li>

                <li className="sidemenu-item">
                  <Link
                    href="/widgets/" 
                    className={`sidemenu-link with-icon border-radius d-block position-relative transition fw-medium ${
                      pathname === "/widgets/" ? "active" : ""
                    }`}
                  >
                    <i className="material-symbols-outlined">widgets</i>
                    <span className="title lh-1">Widgets</span>
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/maps/"
                    className={`sidemenu-link with-icon border-radius d-block position-relative transition fw-medium ${
                      pathname === "/maps/" ? "active" : ""
                    }`}
                  >
                    <i className="material-symbols-outlined">map</i>
                    <span className="title lh-1">Maps</span>
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/notifications/"
                    className={`sidemenu-link with-icon border-radius d-block position-relative transition fw-medium ${
                      pathname === "/notifications/" ? "active" : ""
                    }`}
                  >
                    <i className="material-symbols-outlined">notifications</i>
                    <span className="title lh-1">Notifications</span>
                  </Link>
                </li>

                <li className="sidemenu-item">
                  <Link
                    href="/members/"
                    className={`sidemenu-link with-icon border-radius d-block position-relative transition fw-medium ${
                      pathname === "/members/" ? "active" : ""
                    }`}
                  >
                    <i className="material-symbols-outlined">people</i>
                    <span className="title lh-1">Members</span>
                  </Link>
                </li>
              </ul>
            </div>
          </div>

          <div className="accordion-item border-radius border-0">
            <button
              type="button"
              className="accordion-button text-start shadow-none fw-medium border-0 transition border-radius"
            >
              <i className="material-symbols-outlined">forum</i>
              <span className="title lh-1">Forms</span>
            </button>
            <div className="accordion-body border-radius">
              <ul className="sidebar-sub-menu p-0 list-unstyled mb-0">
                <li className="sidemenu-item">
                  <Link
                    href="/forms/basic-elements/" 
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/forms/basic-elements/" ? "active" : ""
                    }`}
                  >
                    Basic Elements
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/forms/advanced-elements/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/forms/advanced-elements/" ? "active" : ""
                    }`}
                  >
                    Advanced Elements
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/forms/validation/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/forms/validation/" ? "active" : ""
                    }`}
                  >
                    Validation
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/forms/editors/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/forms/editors/" ? "active" : ""
                    }`}
                  >
                    Editors
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/forms/file-upload/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/forms/file-upload/" ? "active" : ""
                    }`}
                  >
                    File Upload
                  </Link>
                </li>
              </ul>
            </div>
          </div>

          <div className="accordion-item border-radius border-0">
            <button
              type="button"
              className="accordion-button text-start shadow-none fw-medium border-0 transition border-radius"
            >
              <i className="material-symbols-outlined">pie_chart</i>
              <span className="title lh-1">Charts</span>
            </button>
            <div className="accordion-body border-radius">
              <ul className="sidebar-sub-menu p-0 list-unstyled mb-0">
                <li className="sidemenu-item">
                  <Link
                    href="/charts/line/" 
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/charts/line/" ? "active" : ""
                    }`}
                  >
                    Line
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/charts/area/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/charts/area/" ? "active" : ""
                    }`}
                  >
                    Area
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/charts/column/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/charts/column/" ? "active" : ""
                    }`}
                  >
                    Column
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/charts/mixed/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/charts/mixed/" ? "active" : ""
                    }`}
                  >
                    Mixed
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/charts/radialbar/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/charts/radialbar/" ? "active" : ""
                    }`}
                  >
                    RadialBar
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/charts/radar/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/charts/radar/" ? "active" : ""
                    }`}
                  >
                    Radar
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/charts/pie/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/charts/pie/" ? "active" : ""
                    }`}
                  >
                    Pie
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/charts/polar/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/charts/polar/" ? "active" : ""
                    }`}
                  >
                    Polar
                  </Link>
                </li>
                <li className="sidemenu-item">
                  <Link
                    href="/charts/more/"
                    className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                      pathname === "/charts/more/" ? "active" : ""
                    }`}
                  >
                    More
                  </Link>
                </li>
              </ul>
            </div>
          </div>

          <div className="accordion-item border-radius border-0">
            <button
              type="button"
              className="accordion-button text-start shadow-none fw-medium border-0 transition border-radius"
            >
              <i className="material-symbols-outlined">open_run</i>
              <span className="title lh-1">Others</span>
            </button>
            <div className="accordion-body border-radius">
              <ul className="sidebar-sub-menu p-0 list-unstyled mb-0">
                <li className="sidemenu-item">
                  <Link
                    href="/my-profile/" 
                    className={`sidemenu-link with-icon border-radius d-block position-relative transition fw-medium ${
                      pathname === "/my-profile/" ? "active" : ""
                    }`}
                  >
                    <i className="material-symbols-outlined">account_circle</i>
                    <span className="title lh-1">My Profile</span>
                  </Link>
                </li>

                <li className="sidemenu-item">
                  <button
                    type="button"
                    className="accordion-button with-icon text-start shadow-none fw-medium border-0 transition border-radius"
                  >
                    <i className="material-symbols-outlined">settings</i>
                    <span className="title lh-1">Settings</span>
                  </button>
                  <div className="accordion-body border-radius">
                    <ul className="sidebar-sub-menu p-0 list-unstyled mb-0">
                      <li className="sidemenu-item">
                        <Link
                          href="/settings/account-settings/" 
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/settings/account-settings/" ? "active" : ""
                          }`}
                        >
                          Account Settings
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/settings/change-password/" 
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/settings/change-password/" ? "active" : ""
                          }`}
                        >
                          Change Password
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/settings/connections/" 
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/settings/connections/" ? "active" : ""
                          }`}
                        >
                          Connections
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/settings/privacy-policy/" 
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/settings/privacy-policy/" ? "active" : ""
                          }`}
                        >
                          Privacy Policy
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="/settings/terms-conditions/" 
                          className={`sidemenu-link border-radius d-block position-relative transition fw-medium ${
                            pathname === "/settings/terms-conditions/" ? "active" : ""
                          }`}
                        >
                          Terms & Conditions
                        </Link>
                      </li>
                    </ul>
                  </div>
                </li>

                <li className="sidemenu-item">
                  <button
                    type="button"
                    className="accordion-button with-icon text-start shadow-none fw-medium border-0 transition border-radius"
                  >
                    <i className="material-symbols-outlined">unfold_more</i>
                    <span className="title lh-1">Multi Level Menu</span>
                  </button>
                  <div className="accordion-body border-radius">
                    <ul className="sidebar-sub-menu p-0 list-unstyled mb-0">
                      <li className="sidemenu-item">
                        <Link
                          href="#"
                          className="sidemenu-link border-radius d-block position-relative transition fw-medium"
                        >
                          First
                        </Link>
                      </li>
                      <li className="sidemenu-item">
                        <Link
                          href="#"
                          className="sidemenu-link border-radius d-block position-relative transition fw-medium"
                        >
                          Third
                        </Link>
                      </li>

                      <li className="sidemenu-item">
                        <button
                          type="button"
                          className="accordion-button text-start shadow-none fw-medium border-0 transition border-radius"
                        >
                          Third
                          <span className="trezo-badge rounded-circle fw-medium d-inline-block text-center">
                            3
                          </span>
                        </button>
                        <div className="accordion-body border-radius">
                          <ul className="sidebar-sub-menu p-0 list-unstyled mb-0">
                            <li className="sidemenu-item">
                              <Link
                                href="#"
                                className="sidemenu-link border-radius d-block position-relative transition fw-medium"
                              >
                                Third 1
                              </Link>
                            </li>

                            <li className="sidemenu-item">
                              <button
                                type="button"
                                className="accordion-button text-start shadow-none fw-medium border-0 transition border-radius"
                              >
                                Third 2
                              </button>
                              <div className="accordion-body border-radius">
                                <ul className="sidebar-sub-menu p-0 list-unstyled mb-0">
                                  <li className="sidemenu-item">
                                    <Link
                                      href="#"
                                      className="sidemenu-link border-radius d-block position-relative transition fw-medium"
                                    >
                                      Four 1
                                    </Link>
                                  </li>
                                </ul>
                              </div>
                            </li>
                            <li className="sidemenu-item">
                              <Link
                                href="#"
                                className="sidemenu-link border-radius d-block position-relative transition fw-medium"
                              >
                                Third 3
                              </Link>
                            </li>
                          </ul>
                        </div>
                      </li>
                    </ul>
                  </div>
                </li>

                <li className="sidemenu-item">
                  <Link
                    href="/authentication/logout"
                    className="sidemenu-link with-icon border-radius d-block position-relative transition fw-medium"
                  >
                    <i className="material-symbols-outlined">logout</i>
                    <span className="title lh-1">Logout</span>
                  </Link>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

export default HorizontalNavbar;
