"use client";

import { Dropdown } from "react-bootstrap";
import { Swiper, SwiperSlide } from "swiper/react";
import { Navigation } from "swiper/modules";
import Image from "next/image";
import Link from "next/link";

const TopSellingProducts = () => {
  const products = [
    {
      id: 1,
      image: "/images/product-29.png",
      name: "Hair Treatment",
      viewDetails: "/ecommerce/product-details/",
      sold: 321,
      price: 23.5,
    },
    {
      id: 2,
      image: "/images/product-30.png",
      name: "Facial Kit",
      viewDetails: "/ecommerce/product-details/",
      sold: 124,
      price: 20.5,
    },
    {
      id: 3,
      image: "/images/product-31.png",
      name: "Winter Cream",
      viewDetails: "/ecommerce/product-details/",
      sold: 76,
      price: 25.5,
    },
    {
      id: 4,
      image: "/images/product-32.png",
      name: "Perfume",
      viewDetails: "/ecommerce/product-details/",
      sold: 24,
      price: 30.5,
    },
    {
      id: 5,
      image: "/images/product-33.png",
      name: "Face Wash",
      viewDetails: "/ecommerce/product-details/",
      sold: 12,
      price: 15.5,
    },
    {
      id: 6,
      image: "/images/product-34.png",
      name: "Glow Serum",
      viewDetails: "/ecommerce/product-details/",
      sold: 23,
      price: 45.5,
    },
    {
      id: 7,
      image: "/images/product-30.png",
      name: "Facial Kit",
      viewDetails: "/ecommerce/product-details/",
      sold: 124,
      price: 20.5,
    },
    {
      id: 8,
      image: "/images/product-31.png",
      name: "Winter Cream",
      viewDetails: "/ecommerce/product-details/",
      sold: 76,
      price: 25.5,
    },
  ];

  return (
    <>
      <div className="bg-white p-4 rounded-3 mb-4">
        <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3 mb-lg-4">
          <h3 className="mb-0">Top Selling Products</h3>

          <Dropdown className="dropdown select-dropdown">
            <Dropdown.Toggle
              variant="secondary"
              id="dropdown-basic"
              className="dropdown-toggle bg-border-color border text-body rounded-2"
              style={{
                paddingRight: "35px",
              }}
            >
              This Month
            </Dropdown.Toggle>

            <Dropdown.Menu className="bg-white border box-shadow">
              <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                This Day
              </Dropdown.Item>

              <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                This Week
              </Dropdown.Item>

              <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                This Month
              </Dropdown.Item>

              <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                This Year
              </Dropdown.Item>
            </Dropdown.Menu>
          </Dropdown>
        </div>

        <div className="position-relative z-0">
          <Swiper
            slidesPerView={1}
            spaceBetween={25}
            navigation={true}
            breakpoints={{
              0: {
                slidesPerView: 1,
              },
              450: {
                slidesPerView: 2,
              },
              768: {
                slidesPerView: 3,
              },
              992: {
                slidesPerView: 4,
              },
              1199: {
                slidesPerView: 4,
              },
              1400: {
                slidesPerView: 4,
              },
              1600: {
                slidesPerView: 4,
              },
              1800: {
                slidesPerView: 6,
              },
            }}
            modules={[Navigation]}
            className="bsts-products-slide"
          >
            {products.map((product) => (
              <SwiperSlide key={product.id}>
                <Link
                  href={product.viewDetails}
                  className="beauty-product d-block text-decoration-none"
                >
                  <Image
                    src={product.image}
                    className="mb-3 rounded-2"
                    alt={product.name}
                    width={465}
                    height={552}
                  />

                  <div className="d-flex flex-wrap gap-1 justify-content-between mb-2">
                    <h4 className="mb-0 fs-14 mb-0 fw-semibold">
                      {product.name}
                    </h4>
                    <span className="d-inline-block bg-success-80 border-success-70 border px-2 rounded-pill text-success-50 fs-12 fw-medium">
                      {product.sold}
                    </span>
                  </div>

                  <div className="d-flex justify-content-between">
                    <span className="fs-14 fw-semibold text-primary-60">
                      ${product.price.toFixed(2)}
                    </span>
                    <span className="fs-12">sold</span>
                  </div>
                </Link>
              </SwiperSlide>
            ))}
          </Swiper>
        </div>
      </div>
    </>
  );
};

export default TopSellingProducts;
