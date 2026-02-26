"use client";

import Link from "next/link";
import Image from "next/image";

const Cta = () => {
  return (
    <>
      <div className="unlock-area ptb-150 position-relative z-1" id="admin">
        <div className="container">
          <div className="border-bottom pb-150">
            <div className="row">
              <div className="unlock-content">
                <h2>Unlock a world of possibilities with Trezo Dashboard.</h2>
                <p>
                  Experience the difference with Trezo Dashboard. Sign up for a
                  free trial today and see how our intuitive platform can
                  revolutionize your data analysis process.
                </p>

                <Link
                  href="/front-pages/contact/"
                  className="btn btn-primary-div py-2 px-4 fs-16 fw-medium rounded-3 text-white"
                >
                  <div className="d-flex align-items-center gap-1">
                    <i className="ri-user-line fs-18"></i>
                    <span>Get started - It is free</span>
                  </div>
                </Link>
              </div>
            </div>
          </div>
        </div>

        <Image
          src="/images/landing/shape-1.png"
          className="shape shape-5"
          alt="shape"
          width={1000}
          height={1000}
        />
        <Image
          src="/images/landing/shape-2.png"
          className="shape shape-6"
          alt="shape"
          width={947}
          height={953}
        />
      </div>
    </>
  );
};

export default Cta;
