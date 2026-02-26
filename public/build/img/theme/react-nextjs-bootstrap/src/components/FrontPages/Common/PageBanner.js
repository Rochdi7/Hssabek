"use client";

import Image from "next/image";

const PageBanner = ({ pageTitle }) => {
  return (
    <>
      <div className="page-banner-area">
        <div className="container position-relative z-1">
          <div className="banner-content text-center mb-0">
            <h1 className="fs-60 mb-0">{pageTitle}</h1>
          </div>

          <Image
            src="/images/landing/shape-5.png"
            className="shape-5"
            alt="shape"
            width={658}
            height={656}
          />
          <Image
            src="/images/landing/shape-6.png"
            className="shape-6"
            alt="shape"
            width={685}
            height={685}
          />
        </div>
      </div>
    </>
  );
};

export default PageBanner;
