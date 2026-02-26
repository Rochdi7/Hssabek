"use client";

import React from "react";
import SearchForm from "./SearchForm";
import AppsMenu from "./AppsMenu";
import ChooseLanguage from "./ChooseLanguage";
import FullscreenButton from "./FullscreenButton";
import Notifications from "./Notifications";
import Profile from "./Profile";
import ControlPanel from "../ControlPanel";
import DarkMode from "./DarkMode";
import HorizontalNavbar from "./HorizontalNavbar";
import Image from "next/image";
import Link from "next/link";

const TopNavbar = ({ toogleActive }) => {
  React.useEffect(() => {
    let elementId = document.getElementById("header");
    document.addEventListener("scroll", () => {
      if (window.scrollY > 170) {
        elementId.classList.add("sticky");
      } else {
        elementId.classList.remove("sticky");
      }
    });
  });

  return (
    <>
      <header
        className="header-area bg-white mb-4 rounded-bottom-15"
        id="header"
      >
        <div className="container-fluid p-0">
          <div className="row align-items-center">
            <div className="col-lg-5 col-sm-6">
              <div className="left-header-content">
                <ul className="d-flex align-items-center ps-0 mb-0 list-unstyled justify-content-center justify-content-sm-start">
                  <li className="hbm">
                    <button
                      className="header-burger-menu bg-transparent p-0 border-0"
                      onClick={toogleActive}
                    >
                      <i className="material-symbols-outlined fs-24">menu</i>
                    </button>
                  </li>

                  <li className="logo-box">
                    <Link href="/dashboard/ecommerce/" className="logo">
                      <Image
                        src="/images/logo.svg"
                        alt="logo"
                        width={100}
                        height={26}
                      />
                    </Link>
                    <Link
                      href="/dashboard/ecommerce/"
                      className="logo white-logo"
                    >
                      <Image
                        src="/images/white-logo.svg"
                        alt="logo"
                        width={100}
                        height={26}
                      />
                    </Link>
                  </li>

                  <li>
                    <SearchForm />
                  </li>

                  <li>
                    <AppsMenu />
                  </li>
                </ul>
              </div>
            </div>

            <div className="col-lg-7 col-sm-6">
              <div className="right-header-content mt-2 mt-sm-0">
                <ul className="d-flex align-items-center justify-content-center justify-content-sm-end ps-0 mb-0 list-unstyled">
                  <li className="header-right-item">
                    <DarkMode />
                  </li>

                  <li className="header-right-item">
                    <ChooseLanguage />
                  </li>

                  <li className="header-right-item">
                    <FullscreenButton />
                  </li>

                  <li className="header-right-item">
                    <Notifications />
                  </li>

                  <li className="header-right-item">
                    <Profile />
                  </li>

                  <li className="header-right-item">
                    <ControlPanel />
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <HorizontalNavbar />
      </header>
    </>
  );
};

export default TopNavbar;
