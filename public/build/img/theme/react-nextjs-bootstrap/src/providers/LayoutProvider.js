"use client";

import React, { useState } from "react";
import { usePathname } from "next/navigation";
import LeftSidebar from "@/components/Layout/LeftSidebar";
import TopNavbar from "@/components/Layout/TopNavbar";
import Footer from "@/components/Layout/Footer";
import ControlPanel from "@/components/Layout/ControlPanel";

const LayoutProvider = ({ children }) => {
  const [active, setActive] = useState(false);
  const pathname = usePathname();

  const toogleActive = () => {
    setActive(!active);
  };
  
  return (
    <>
      <div className={`main-wrapper-content ${active && "active"}`}>
        {!(
          pathname === "/authentication/sign-in/" ||
          pathname === "/authentication/sign-up/" ||
          pathname === "/authentication/forgot-password/" ||
          pathname === "/authentication/reset-password/" ||
          pathname === "/authentication/lock-screen/" ||
          pathname === "/authentication/confirm-email/" ||
          pathname === "/authentication/logout/" ||

          pathname === "/" ||
          pathname === "/front-pages/features/" ||
          pathname === "/front-pages/team/" ||
          pathname === "/front-pages/faq/" ||
          pathname === "/front-pages/contact/"
        ) && (
          <>
            <LeftSidebar toogleActive={toogleActive} />
          </>
        )}

        <div className="main-content d-flex flex-column">
          {!(
            pathname === "/authentication/sign-in/" ||
            pathname === "/authentication/sign-up/" ||
            pathname === "/authentication/forgot-password/" ||
            pathname === "/authentication/reset-password/" ||
            pathname === "/authentication/lock-screen/" ||
            pathname === "/authentication/confirm-email/" ||
            pathname === "/authentication/logout/" ||

            pathname === "/" ||
            pathname === "/front-pages/features/" ||
            pathname === "/front-pages/team/" ||
            pathname === "/front-pages/faq/" ||
            pathname === "/front-pages/contact/"
          ) && (
            <>
              <TopNavbar toogleActive={toogleActive} />
            </>
          )}

          {children}

          {!(
            pathname === "/authentication/sign-in/" ||
            pathname === "/authentication/sign-up/" ||
            pathname === "/authentication/forgot-password/" ||
            pathname === "/authentication/reset-password/" ||
            pathname === "/authentication/lock-screen/" ||
            pathname === "/authentication/confirm-email/" ||
            pathname === "/authentication/logout/" ||
            
            pathname === "/" ||
            pathname === "/front-pages/features/" ||
            pathname === "/front-pages/team/" ||
            pathname === "/front-pages/faq/" ||
            pathname === "/front-pages/contact/"
          ) && <Footer />}
        </div>
      </div>
      
      <div
        style={{
          position: 'fixed',
          bottom: '0',
          right: '0',
          opacity: '0',
          visibility: 'hidden'
        }}
      >
        <ControlPanel />
      </div>
    </>
  );
};

export default LayoutProvider;
