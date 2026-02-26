"use client";

import { Card } from "react-bootstrap";
import ProductImage from "./ProductImage";
import CapacitySelector from "./CapacitySelector";
import StyleSelector from "./StyleSelector";
import ColorSelector from "./ColorSelector";
import ProductQuantity from "./ProductQuantity";

const ProductDetails = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="row">
            <div className="col-lg-6">
              <ProductImage />
            </div>

            <div className="col-lg-6">
              <div className="product-details-content ms-lg-4 ms-xl-3 ms-xxl-5 mt-4 mt-lg-0">
                <span className="bg-success bg-opacity-10 text-success d-inline-block py-1 px-3 rounded-3 mb-3">
                  <i className="ri-check-line fs-16 position-relative top-1"></i>
                  in stock
                </span>
                
                <h3 className="fs-18 fw-medium lh-base lh-sm mb-3">
                  Apple MacBook Pro 16.2&quot; with Liquid Retina XDR Display, M2 Max
                  Chip with 12-Core CPU
                </h3>

                <div className="d-flex gap-1 mb-3 pb-3 border-bottom">
                  <i className="ri-star-fill fs-16 text-warning"></i>
                  <i className="ri-star-fill fs-16 text-warning"></i>
                  <i className="ri-star-fill fs-16 text-warning"></i>
                  <i className="ri-star-fill fs-16 text-warning"></i>
                  <i className="ri-star-fill fs-16 text-warning"></i>
                  <span className="position-relative top-2 ms-2">
                    (5 Reviews)
                  </span>
                </div>

                <h2 className="fs-18 mb-3">
                  $3,499 <del className="fw-normal fs-16 ms-2">$3,799</del>
                </h2>

                {/* Style */}
                <StyleSelector />

                {/* Capacity */}
                <CapacitySelector />

                <ColorSelector />

                <div className="d-flex align-items-center mb-4 gap-3">
                  <ProductQuantity />
                   
                  <button className="btn btn-primary rounded-3 py-2">
                    <i className="ri-shopping-cart-line text-white"></i> {' '}
                    <span>Add To Cart</span>
                  </button>
                </div>

                <button className="d-flex align-items-center gap-2 mb-2 border-0 bg-transparent">
                  <i className="ri-heart-line wh-30 lh-30 d-inline-block bg-border-color fs-16 rounded-pill text-body"></i>
                  <span className="fs-14 fw-medium">Add to wishlist</span>
                </button>

                <button className="d-flex align-items-center gap-2 border-0 bg-transparent">
                  <i className="ri-eye-line wh-30 lh-30 d-inline-block bg-border-color fs-16 rounded-pill text-body"></i>
                  <span className="fs-14">
                    565 people are viewing the products
                  </span>
                </button>

                <ul className="ps-0 list-unstyled border-top border-bottom py-3 my-3">
                  <li className="d-flex align-items-center mb-2">
                    <i className="ri-check-line fs-18 position-relative top-2 text-success me-2"></i>
                    <span className="text-secondary">Free delivery today</span>
                  </li>
                  <li className="d-flex align-items-center mb-2">
                    <i className="ri-check-line fs-18 position-relative top-2 text-success me-2"></i>
                    <span className="text-secondary">
                      100% money back Guarantee
                    </span>
                  </li>
                  <li className="d-flex align-items-center mb-2">
                    <i className="ri-check-line fs-18 position-relative top-2 text-success me-2"></i>
                    <span className="text-secondary">
                      7 days product return policy
                    </span>
                  </li>
                </ul>

                <ul className="ps-0 mb-3 list-unstyled">
                  <li className="d-flex align-items-center mb-2">
                    <span>SKU:</span>
                    <span className="fw-medium text-secondary ms-1">
                      SMTGS6T45
                    </span>
                  </li>
                  <li className="d-flex align-items-center mb-2">
                    <span>Category:</span>
                    <span className="fw-medium text-secondary ms-1">
                      Computer
                    </span>
                  </li>
                  <li className="d-flex align-items-center">
                    <span>Tags:</span>
                    <span className="fw-medium text-secondary ms-1">
                      laptop, macbook, PC
                    </span>
                  </li>
                </ul>

                <ul className="ps-0 mb-0 list-unstyled d-flex gap-2 flex-wrap">
                  <li className="d-flex align-items-center me-2">
                    <span>Share:</span>
                  </li>
                  <li className="d-flex align-items-center gap-2">
                    <a
                      href="https://facebook.com/"
                      className="wh-30 lh-30 bg-body text-center text-decoration-none rounded-pill hover-bg"
                      target="_blank"
                    >
                      <i className="ri-facebook-fill"></i>
                    </a>
                  </li>
                  <li className="d-flex align-items-center gap-2">
                    <a
                      href="https://twitter.com/"
                      className="wh-30 lh-30 bg-body text-center text-decoration-none rounded-pill hover-bg"
                      target="_blank"
                    >
                      <i className="ri-twitter-x-line"></i>
                    </a>
                  </li>
                  <li className="d-flex align-items-center gap-2">
                    <a
                      href="https://linkedin.com/"
                      className="wh-30 lh-30 bg-body text-center text-decoration-none rounded-pill hover-bg"
                      target="_blank"
                    >
                      <i className="ri-linkedin-fill"></i>
                    </a>
                  </li>
                  <li className="d-flex align-items-center gap-2">
                    <a
                      href="https://whatsapp.com/"
                      className="wh-30 lh-30 bg-body text-center text-decoration-none rounded-pill hover-bg"
                      target="_blank"
                    >
                      <i className="ri-whatsapp-line"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default ProductDetails;
