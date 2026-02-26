"use client";

import Link from "next/link";
import Image from "next/image"; 

const Footer = () => {
  return (
    <>
      <div className="footers-area pb-125 position-relative z-2">
        <div className="container">
          <div className="row">
            <div className="col-lg-3 col-sm-6">
              <div className="footer-single-item mb-4">
                <Link href="/" className="footer-logo d-inline-block mb-4">
                  <Image
                    src="/images/landing/logo.svg"
                    alt="logo"
                    width={132}
                    height={34}
                    className="black-logo"
                  />
                  <Image
                    src="/images/white-logo.svg"
                    alt="logo"
                    width={132}
                    height={34}
                    className="white-logo"
                  />
                </Link>

                <p className="mb-4 pb-lg-2">
                  With customizable dashboards tailored to your needs,
                  collaborate effortlessly with your team and stay ahead with
                  real-time updates.
                </p>

                <ul className="ps-0 mb-0 list-unstyled d-flex flex-wrap gap-3">
                  <li>
                    <a
                      href="https://www.facebook.com/"
                      target="_blank"
                      className="text-decoration-none fs-20 text-primary"
                    >
                      <i className="ri-facebook-fill"></i>
                    </a>
                  </li>
                  <li>
                    <a
                      href="https://www.twitter.com/"
                      target="_blank"
                      className="text-decoration-none fs-20 text-primary"
                    >
                      <i className="ri-twitter-x-line"></i>
                    </a>
                  </li>
                  <li>
                    <a
                      href="https://www.linkedin.com/"
                      target="_blank"
                      className="text-decoration-none fs-20 text-primary"
                    >
                      <i className="ri-linkedin-fill"></i>
                    </a>
                  </li>
                  <li>
                    <a
                      href="https://www.dribbble.com/"
                      target="_blank"
                      className="text-decoration-none fs-20 text-primary"
                    >
                      <i className="ri-dribbble-line"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>

            <div className="col-lg-3 col-sm-6">
              <div className="footer-single-item mb-4 ms-lg-5 ps-lg-5">
                <h3 className="mb-md-4 mb-3 fw-semibold">Our Products</h3>
                <ul className="ps-0 mb-0 list-unstyled">
                  <li className="mb-2 pb-1">
                    <a href="#" className="text-decoration-none">
                      Trezo Dashboard
                    </a>
                  </li>
                  <li className="mb-2 pb-1">
                    <a href="#" className="text-decoration-none">
                      Tagus Admin
                    </a>
                  </li>
                  <li className="mb-2 pb-1">
                    <a href="#" className="text-decoration-none">
                      eCademy LMS
                    </a>
                  </li>
                  <li className="mb-0">
                    <a href="#" className="text-decoration-none">
                      Admash Template
                    </a>
                  </li>
                </ul>
              </div>
            </div>

            <div className="col-lg-3 col-sm-6">
              <div className="footer-single-item mb-4 ms-lg-5 ps-lg-4">
                <h3 className="mb-md-4 mb-3 fw-semibold">Quick Links</h3>
                <ul className="ps-0 mb-0 list-unstyled">
                  <li className="mb-2 pb-1">
                    <a href="#" className="text-decoration-none">
                      Home
                    </a>
                  </li>
                  <li className="mb-2 pb-1">
                    <a href="#" className="text-decoration-none">
                      Features
                    </a>
                  </li>
                  <li className="mb-2 pb-1">
                    <a href="#" className="text-decoration-none">
                      Testimonials
                    </a>
                  </li>
                  <li className="mb-0">
                    <a href="#" className="text-decoration-none">
                      Our Team
                    </a>
                  </li>
                </ul>
              </div>
            </div>

            <div className="col-lg-3 col-sm-6">
              <div className="footer-single-item mb-4">
                <h3 className="mb-md-4 mb-3 fw-semibold">Privacy Policy</h3>
                <ul className="ps-0 mb-0 list-unstyled">
                  <li className="mb-2 pb-1">
                    <a href="#" className="text-decoration-none">
                      Terms & Conditions
                    </a>
                  </li>
                  <li className="mb-2 pb-1">
                    <a href="#" className="text-decoration-none">
                      Cookie Policy
                    </a>
                  </li>
                  <li className="mb-2 pb-1">
                    <a href="#" className="text-decoration-none">
                      Notice at Collection
                    </a>
                  </li>
                  <li className="mb-0">
                    <a href="#" className="text-decoration-none">
                      Privacy Policy
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div className="copyright-area bg-white text-center py-4">
        <div className="container">
          <p className="fs-14">
            © <span className="text-primary-div">Trezo</span> is Proudly Owned
            by{" "}
            <a
              href="https://envytheme.com/"
              target="_blank"
              className="text-decoration-none text-primary"
            >
              EnvyTheme
            </a>
          </p>
        </div>
      </div>
    </>
  );
};

export default Footer;
