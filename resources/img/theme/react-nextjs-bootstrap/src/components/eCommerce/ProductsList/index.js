"use client";

import React, { useState } from "react";
import { Card, Tab, Tabs, Form, Table } from "react-bootstrap";
import Link from "next/link";
import Image from "next/image";

const productsData = [
  {
    id: "#JAN-999",
    img: "/images/product-1.jpg",
    title: "Smart Band",
    detailsLink: "/ecommerce/product-details",
    date: "08 Jun 2024",
    category: "Watch",
    price: "$35.00",
    order: 75,
    stock: "750",
    amount: "$2,625",
    rating: "5.00 (141 reviews)",
    status: "published",
  },
  {
    id: "#JAN-998",
    img: "/images/product-2.jpg",
    title: "Headphone",
    detailsLink: "/ecommerce/product-details",
    date: "07 Jun 2024",
    category: "Electronics",
    price: "$49.00",
    order: 25,
    stock: "825",
    amount: "$1,225",
    rating: "5.00 (69 reviews)",
    status: "draft",
  },
  {
    id: "#JAN-997",
    img: "/images/product-3.jpg",
    title: "iPhone 15 Plus",
    detailsLink: "/ecommerce/product-details",
    date: "06 Jun 2024",
    category: "Apple",
    price: "$99.00",
    order: 55,
    stock: "Stock Out",
    amount: "$5,445",
    rating: "5.00 (99 reviews)",
    status: "published",
  },
  {
    id: "#JAN-996",
    img: "/images/product-4.jpg",
    title: "Bluetooth Speaker",
    detailsLink: "/ecommerce/product-details",
    date: "05 Jun 2024",
    category: "Google",
    price: "$59.00",
    order: 40,
    stock: "535",
    amount: "$2,360",
    rating: "4.00 (75 reviews)",
    status: "published",
  },
  {
    id: "#JAN-999",
    img: "/images/product-1.jpg",
    title: "Smart Band",
    detailsLink: "/ecommerce/product-details",
    date: "08 Jun 2024",
    category: "Watch",
    price: "$35.00",
    order: 75,
    stock: "750",
    amount: "$2,625",
    rating: "5.00 (141 reviews)",
    status: "published",
  },
  {
    id: "#JAN-998",
    img: "/images/product-2.jpg",
    title: "Headphone",
    detailsLink: "/ecommerce/product-details",
    date: "07 Jun 2024",
    category: "Electronics",
    price: "$49.00",
    order: 25,
    stock: "825",
    amount: "$1,225",
    rating: "5.00 (69 reviews)",
    status: "draft",
  },
  {
    id: "#JAN-997",
    img: "/images/product-3.jpg",
    title: "iPhone 15 Plus",
    detailsLink: "/ecommerce/product-details",
    date: "06 Jun 2024",
    category: "Apple",
    price: "$99.00",
    order: 55,
    stock: "Stock Out",
    amount: "$5,445",
    rating: "5.00 (99 reviews)",
    status: "published",
  },
  {
    id: "#JAN-996",
    img: "/images/product-4.jpg",
    title: "Bluetooth Speaker",
    detailsLink: "/ecommerce/product-details",
    date: "05 Jun 2024",
    category: "Google",
    price: "$59.00",
    order: 40,
    stock: "535",
    amount: "$2,360",
    rating: "4.00 (75 reviews)",
    status: "published",
  },
  {
    id: "#JAN-995",
    img: "/images/product-5.jpg",
    title: "Airbuds 2nd Gen",
    detailsLink: "/ecommerce/product-details",
    date: "04 Jun 2024",
    category: "Headphone",
    price: "$79.00",
    order: 56,
    stock: "460",
    amount: "$4,424",
    rating: "5.00 (158 reviews)",
    status: "draft",
  },
  {
    id: "#JAN-994",
    img: "/images/product-6.jpg",
    title: "Gaming Mouse",
    detailsLink: "/ecommerce/product-details",
    date: "03 Jun 2024",
    category: "Accessories",
    price: "$25.00",
    order: 90,
    stock: "600",
    amount: "$2,250",
    rating: "4.50 (120 reviews)",
    status: "published",
  },
  {
    id: "#JAN-993",
    img: "/images/product-7.jpg",
    title: "Mechanical Keyboard",
    detailsLink: "/ecommerce/product-details",
    date: "02 Jun 2024",
    category: "Electronics",
    price: "$89.00",
    order: 35,
    stock: "200",
    amount: "$3,115",
    rating: "4.80 (89 reviews)",
    status: "published",
  },
  {
    id: "#JAN-992",
    img: "/images/product-8.jpg",
    title: "Smartwatch Pro",
    detailsLink: "/ecommerce/product-details",
    date: "01 Jun 2024",
    category: "Watch",
    price: "$120.00",
    order: 20,
    stock: "150",
    amount: "$2,400",
    rating: "4.90 (77 reviews)",
    status: "draft",
  },
  {
    id: "#JAN-991",
    img: "/images/product-9.jpg",
    title: "4K Monitor",
    detailsLink: "/ecommerce/product-details",
    date: "31 May 2024",
    category: "Electronics",
    price: "$250.00",
    order: 10,
    stock: "80",
    amount: "$2,500",
    rating: "4.70 (54 reviews)",
    status: "published",
  },
  {
    id: "#JAN-990",
    img: "/images/product-10.jpg",
    title: "Wireless Charger",
    detailsLink: "/ecommerce/product-details",
    date: "30 May 2024",
    category: "Accessories",
    price: "$30.00",
    order: 50,
    stock: "900",
    amount: "$1,500",
    rating: "4.80 (67 reviews)",
    status: "published",
  },
  {
    id: "#JAN-995",
    img: "/images/product-5.jpg",
    title: "Airbuds 2nd Gen",
    detailsLink: "/ecommerce/product-details",
    date: "04 Jun 2024",
    category: "Headphone",
    price: "$79.00",
    order: 56,
    stock: "460",
    amount: "$4,424",
    rating: "5.00 (158 reviews)",
    status: "draft",
  },
  {
    id: "#JAN-994",
    img: "/images/product-6.jpg",
    title: "Gaming Mouse",
    detailsLink: "/ecommerce/product-details",
    date: "03 Jun 2024",
    category: "Accessories",
    price: "$25.00",
    order: 90,
    stock: "600",
    amount: "$2,250",
    rating: "4.50 (120 reviews)",
    status: "published",
  },
  {
    id: "#JAN-993",
    img: "/images/product-7.jpg",
    title: "Mechanical Keyboard",
    detailsLink: "/ecommerce/product-details",
    date: "02 Jun 2024",
    category: "Electronics",
    price: "$89.00",
    order: 35,
    stock: "200",
    amount: "$3,115",
    rating: "4.80 (89 reviews)",
    status: "published",
  },
  {
    id: "#JAN-992",
    img: "/images/product-8.jpg",
    title: "Smartwatch Pro",
    detailsLink: "/ecommerce/product-details",
    date: "01 Jun 2024",
    category: "Watch",
    price: "$120.00",
    order: 20,
    stock: "150",
    amount: "$2,400",
    rating: "4.90 (77 reviews)",
    status: "draft",
  },
  {
    id: "#JAN-991",
    img: "/images/product-9.jpg",
    title: "4K Monitor",
    detailsLink: "/ecommerce/product-details",
    date: "31 May 2024",
    category: "Electronics",
    price: "$250.00",
    order: 10,
    stock: "80",
    amount: "$2,500",
    rating: "4.70 (54 reviews)",
    status: "published",
  },
  {
    id: "#JAN-990",
    img: "/images/product-10.jpg",
    title: "Wireless Charger",
    detailsLink: "/ecommerce/product-details",
    date: "30 May 2024",
    category: "Accessories",
    price: "$30.00",
    order: 50,
    stock: "900",
    amount: "$1,500",
    rating: "4.80 (67 reviews)",
    status: "published",
  },
];

const ProductsList = () => {
  const [activeTab, setActiveTab] = useState("allProducts");
  const [searchQuery, setSearchQuery] = useState("");
  const [currentPage, setCurrentPage] = useState(1);
  const [itemsPerPage] = useState(10); // Number of items per page

  const handleSearchChange = (e) => {
    setSearchQuery(e.target.value.toLowerCase());
    setCurrentPage(1); // Reset to the first page when searching
  };

  const filteredProducts = productsData.filter((product) => {
    const matchesTab =
      activeTab === "allProducts" ||
      product.status === activeTab.replace("Products", "");
    const matchesSearch = product.title.toLowerCase().includes(searchQuery);
    return matchesTab && matchesSearch;
  });

  // Calculate the total number of pages
  const totalPages = Math.ceil(filteredProducts.length / itemsPerPage);

  // Get the current page's products
  const indexOfLastItem = currentPage * itemsPerPage;
  const indexOfFirstItem = indexOfLastItem - itemsPerPage;
  const currentProducts = filteredProducts.slice(indexOfFirstItem, indexOfLastItem);

  // Condition to hide pagination if total products are 10 or less
  const showPagination = filteredProducts.length > 10;

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <Tabs
            activeKey={activeTab}
            onSelect={(key) => {
              setActiveTab(key || "allProducts");
              setCurrentPage(1); // Reset to the first page when changing tabs
            }}
            className="border-0 gap-3 mb-lg-4 mb-3 products-list-tabs"
          >
            {["allProducts", "publishedProducts", "draftProducts"].map((tab) => (
              <Tab
                key={tab}
                eventKey={tab}
                title={tab.replace("Products", " Products")} 
              >
                <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-lg-4 mb-3">
                  <Form className="position-relative table-src-form me-0">
                    <Form.Control
                      type="text"
                      placeholder="Search here"
                      value={searchQuery}
                      onChange={handleSearchChange}
                    />

                    <span className="material-symbols-outlined position-absolute top-50 start-0 translate-middle-y">
                      search
                    </span>
                  </Form>

                  <Link
                    href="/ecommerce/create-product/"
                    className="btn btn-outline-primary py-1 px-2 px-sm-4 fs-14 fw-medium rounded-3 hover-bg"
                  >
                    <span className="py-sm-1 d-block">
                      <i className="ri-add-line d-none d-sm-inline-block fs-18"></i>
                      <span>Add New Product</span>
                    </span>
                  </Link>
                </div>

                <div className="default-table-area all-products">
                  <div className="table-responsive">
                    <Table className="align-middle">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Product</th>
                          <th scope="col">Category</th>
                          <th scope="col">Price</th>
                          <th scope="col">Order</th>
                          <th scope="col">Stock</th>
                          <th scope="col">Amount</th>
                          <th scope="col">Rating</th>
                          <th scope="col">Status</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        {currentProducts.length > 0 ? (
                          currentProducts.map((product, i) => (
                            <tr key={i}>
                              <td>{product.id}</td>

                              <td>
                                <Link
                                  href={product.detailsLink}
                                  className="d-flex align-items-center"
                                >
                                  <Image
                                    src={product.img}
                                    className="wh-40 rounded-3"
                                    alt="product-1"
                                    width={40}
                                    height={40}
                                  />
                                  <div className="ms-2 ps-1">
                                    <h6 className="fw-medium fs-14">
                                      {product.title}
                                    </h6>
                                    <span className="fs-12 text-body">
                                      {product.date}
                                    </span>
                                  </div>
                                </Link>
                              </td>

                              <td>{product.category}</td>

                              <td>{product.price}</td>

                              <td>{product.order}</td>

                              <td>{product.stock}</td>

                              <td>{product.amount}</td>

                              <td>{product.rating}</td>

                              <td>
                                <span
                                  className={`badge bg-opacity-10 p-2 fs-12 fw-normal text-capitalize ${product.status}`}
                                >
                                  {product.status}
                                </span>
                              </td>

                              <td>
                                <div className="d-flex align-items-center gap-1">
                                  <Link href={product.detailsLink}>
                                    <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                                      <span className="material-symbols-outlined fs-16 text-primary">
                                        visibility
                                      </span>
                                    </button>
                                  </Link>

                                  <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                                    <span className="material-symbols-outlined fs-16 text-body">
                                      edit
                                    </span>
                                  </button>

                                  <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                                    <span className="material-symbols-outlined text-danger fs-16">
                                      delete
                                    </span>
                                  </button>
                                </div>
                              </td>
                            </tr>
                          ))
                        ) : (
                          <tr>
                            <td colSpan="10" className="text-center">
                              No products found
                            </td>
                          </tr>
                        )}
                      </tbody>
                    </Table>
                  </div>

                  <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap">
                    <span className="fs-13 fw-medium">
                      Showing {currentProducts.length} of{" "}
                      {filteredProducts.length} Products
                    </span>
                    
                    {/* Conditionally render pagination */}
                    {showPagination && (
                    <div className="d-flex align-items-center">
                      <nav aria-label="Page navigation example">
                        <ul className="pagination mb-0 justify-content-center">
                          <li className="page-item">
                            <button
                              className="page-link icon"
                              onClick={() =>
                                setCurrentPage((prev) => Math.max(prev - 1, 1))
                              }
                              disabled={currentPage === 1}
                            >
                              <span className="material-symbols-outlined">
                                keyboard_arrow_left
                              </span>
                            </button>
                          </li>

                          {[...Array(totalPages)].map((_, index) => (
                            <li key={index} className="page-item">
                              <button
                                className={`page-link ${
                                  currentPage === index + 1 ? "active" : ""
                                }`}
                                onClick={() => setCurrentPage(index + 1)}
                              >
                                {index + 1}
                              </button>
                            </li>
                          ))}

                          <li className="page-item">
                            <button
                              className="page-link icon"
                              onClick={() =>
                                setCurrentPage((prev) =>
                                  Math.min(prev + 1, totalPages)
                                )
                              }
                              disabled={currentPage === totalPages}
                            >
                              <span className="material-symbols-outlined">
                                keyboard_arrow_right
                              </span>
                            </button>
                          </li>
                        </ul>
                      </nav>
                    </div>
 )}
                  </div>

                </div>
              </Tab>
            ))}
          </Tabs>
        </Card.Body>
      </Card>
    </>
  );
};

export default ProductsList;