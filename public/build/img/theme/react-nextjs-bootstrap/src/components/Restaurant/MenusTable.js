"use client";

import React, { useEffect, useState } from "react";
import Image from "next/image";
import Link from "next/link";
import { Card, Table, Form, Button, Row, Col } from "react-bootstrap";

const MenusTable = () => {
  const [menus, setMenus] = useState([]);
  const [currentPage, setCurrentPage] = useState(1);
  const [itemsPerPage] = useState(10); // Number of items per page
  const [searchQuery, setSearchQuery] = useState("");

  useEffect(() => {
    // Simulate API call
    const mockMenus = [
      {
        code: "#001",
        item: "Buffalo Chicken",
        image: "/images/restaurant/menu1.png",
        viewLink: "/restaurant/dish-details/",
        price: "16.00",
        ingredients: "Pan-seared chicken, lemon zest, garlic butter, parsley",
      },
      {
        code: "#002",
        item: "Margherita Pizza",
        image: "/images/restaurant/menu2.png",
        viewLink: "/restaurant/dish-details/",
        price: "12.00",
        ingredients: "Tomato sauce, mozzarella, fresh basil, olive oil",
      },
      {
        code: "#003",
        item: "Caesar Salad",
        image: "/images/restaurant/menu3.png",
        viewLink: "/restaurant/dish-details/",
        price: "10.00",
        ingredients: "Romaine lettuce, parmesan, croutons, Caesar dressing",
      },
      {
        code: "#004",
        item: "Spaghetti Carbonara",
        image: "/images/restaurant/menu4.png",
        viewLink: "/restaurant/dish-details/",
        price: "14.00",
        ingredients: "Spaghetti, pancetta, egg yolk, parmesan, black pepper",
      },
      {
        code: "#005",
        item: "Grilled Salmon",
        image: "/images/restaurant/menu5.png",
        viewLink: "/restaurant/dish-details/",
        price: "18.00",
        ingredients: "Salmon fillet, lemon butter sauce, asparagus, dill",
      },
      {
        code: "#006",
        item: "Beef Tacos",
        image: "/images/restaurant/menu6.png",
        viewLink: "/restaurant/dish-details/",
        price: "11.00",
        ingredients: "Ground beef, lettuce, cheddar cheese, salsa, tortillas",
      },
      {
        code: "#007",
        item: "Vegetable Stir-Fry",
        image: "/images/restaurant/menu7.png",
        viewLink: "/restaurant/dish-details/",
        price: "13.00",
        ingredients: "Mixed vegetables, soy sauce, ginger, garlic, rice",
      },
      {
        code: "#008",
        item: "Chicken Alfredo",
        image: "/images/restaurant/menu8.png",
        viewLink: "/restaurant/dish-details/",
        price: "15.00",
        ingredients: "Fettuccine, grilled chicken, Alfredo sauce, parsley",
      },
      {
        code: "#009",
        item: "Shrimp Scampi",
        image: "/images/restaurant/menu9.png",
        viewLink: "/restaurant/dish-details/",
        price: "17.00",
        ingredients: "Shrimp, garlic, white wine, lemon, linguine",
      },
      {
        code: "#010",
        item: "BBQ Ribs",
        image: "/images/restaurant/menu10.png",
        viewLink: "/restaurant/dish-details/",
        price: "20.00",
        ingredients: "Pork ribs, barbecue sauce, coleslaw, cornbread",
      },
      {
        code: "#011",
        item: "Vegetarian Burger",
        image: "/images/restaurant/menu1.png",
        viewLink: "/restaurant/dish-details/",
        price: "12.00",
        ingredients: "Veggie patty, lettuce, tomato, avocado, whole-grain bun",
      },
      {
        code: "#012",
        item: "Lobster Bisque",
        image: "/images/restaurant/menu2.png",
        viewLink: "/restaurant/dish-details/",
        price: "19.00",
        ingredients: "Lobster meat, cream, sherry, chives",
      },
      {
        code: "#013",
        item: "Greek Salad",
        image: "/images/restaurant/menu3.png",
        viewLink: "/restaurant/dish-details/",
        price: "9.00",
        ingredients: "Cucumber, tomato, feta cheese, olives, oregano",
      },
      {
        code: "#014",
        item: "Chicken Parmesan",
        image: "/images/restaurant/menu4.png",
        viewLink: "/restaurant/dish-details/",
        price: "16.00",
        ingredients: "Breaded chicken, marinara sauce, mozzarella, spaghetti",
      },
      {
        code: "#015",
        item: "Fish and Chips",
        image: "/images/restaurant/menu5.png",
        viewLink: "/restaurant/dish-details/",
        price: "14.00",
        ingredients: "Battered cod, french fries, tartar sauce, lemon wedge",
      },
      {
        code: "#016",
        item: "Mushroom Risotto",
        image: "/images/restaurant/menu6.png",
        viewLink: "/restaurant/dish-details/",
        price: "15.00",
        ingredients: "Arborio rice, wild mushrooms, parmesan, truffle oil",
      },
      {
        code: "#017",
        item: "Steak Frites",
        image: "/images/restaurant/menu7.png",
        viewLink: "/restaurant/dish-details/",
        price: "22.00",
        ingredients: "Grilled steak, french fries, herb butter, mixed greens",
      },
      {
        code: "#018",
        item: "Pad Thai",
        image: "/images/restaurant/menu8.png",
        viewLink: "/restaurant/dish-details/",
        price: "13.00",
        ingredients:
          "Rice noodles, shrimp, peanuts, bean sprouts, tamarind sauce",
      },
      {
        code: "#019",
        item: "Eggplant Parmesan",
        image: "/images/restaurant/menu9.png",
        viewLink: "/restaurant/dish-details/",
        price: "14.00",
        ingredients: "Breaded eggplant, marinara sauce, mozzarella, basil",
      },
      {
        code: "#020",
        item: "Chocolate Lava Cake",
        image: "/images/restaurant/menu10.png",
        viewLink: "/restaurant/dish-details/",
        price: "8.00",
        ingredients:
          "Molten chocolate cake, vanilla ice cream, raspberry coulis",
      },
    ];

    setMenus(mockMenus);
  }, []);

  // Filter menus based on search query
  const filteredMenus = menus.filter(
    (menu) =>
      menu.code.toLowerCase().includes(searchQuery.toLowerCase()) ||
      menu.item.toLowerCase().includes(searchQuery.toLowerCase())
  );

  // Calculate pagination
  const indexOfLastItem = currentPage * itemsPerPage;
  const indexOfFirstItem = indexOfLastItem - itemsPerPage;
  const currentItems = filteredMenus.slice(indexOfFirstItem, indexOfLastItem);
  const totalPages = Math.ceil(filteredMenus.length / itemsPerPage);

  const handlePageChange = (pageNumber) => {
    setCurrentPage(pageNumber);
  };

  const handleNext = () => {
    if (currentPage < totalPages) {
      setCurrentPage(currentPage + 1);
    }
  };

  const handlePrevious = () => {
    if (currentPage > 1) {
      setCurrentPage(currentPage - 1);
    }
  };

  // Modal
  const [isShowModal, setShowModal] = useState("false");
  const handleToggleShowModal = () => {
    setShowModal(!isShowModal);
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-1">
            <form className="position-relative table-src-form me-0">
              <input
                type="text"
                className="form-control bg-body-bg border-body-bg ps-3"
                style={{
                  width: "260px",
                  height: "40px",
                }}
                placeholder="Search here..."
                value={searchQuery}
                onChange={(e) => setSearchQuery(e.target.value)}
              />

              <button
                className="bg-transparent p-0 pe-3 lh-1 border-0 position-absolute top-50 end-0 translate-middle-y text-primary"
                type="button"
              >
                <i className="material-symbols-outlined position-relative top-2 pe-3">
                  search
                </i>
              </button>
            </form>

            <button
              className="btn btn-outline-primary fs-14 fw-medium rounded-3 hover-bg"
              style={{
                padding: "3px 13px",
                lineHeight: 1,
              }}
              onClick={handleToggleShowModal}
            >
              <span className="py-sm-1 d-block">
                <i className="ri-add-line d-none d-sm-inline-block fs-18 position-relative top-1"></i>
                <span>Add New Dish</span>
              </span>
            </button>
          </div>

          <div className="default-table-area style-two campaigns-table recent-order-list-table">
            <div className="table-responsive">
              <Table className="align-middle border-0">
                <thead>
                  <tr className="border-bottom">
                    <th className="bg-transparent text-body fw-medium">
                      <Form.Check type="checkbox" id="default-checkbox" />
                    </th>
                    <th className="bg-transparent text-body fw-medium">
                      <span className="fs-10 text-body-color-60 fw-bold letter-spacing-1">
                        CODE
                      </span>
                    </th>
                    <th className="bg-transparent text-body fw-medium">
                      <span className="fs-10 text-body-color-60 fw-bold letter-spacing-1">
                        ITEM
                      </span>
                    </th>
                    <th className="bg-transparent text-body fw-medium">
                      <span className="fs-10 text-body-color-60 fw-bold letter-spacing-1">
                        PRICE
                      </span>
                    </th>
                    <th className="bg-transparent text-body fw-medium">
                      <span className="fs-10 text-body-color-60 fw-bold letter-spacing-1">
                        INGREDIENTS
                      </span>
                    </th>
                    <th className="text-end bg-transparent text-body fw-medium">
                      <span className="fs-10 text-body-color-60 fw-bold letter-spacing-1">
                        ACTION
                      </span>
                    </th>
                  </tr>
                </thead>

                <tbody>
                  {currentItems.map((menu) => (
                    <tr key={menu.code}>
                      <td className="fs-12 fw-semibold text-body">
                        <Form.Check type="checkbox" id="default-checkbox" />
                      </td>

                      <td className="fs-12 fw-semibold text-body">
                        {menu.code}
                      </td>

                      <td>
                        <div className="d-flex align-items-center">
                          <div className="flex-shrink-0">
                            <Image
                              src={menu.image}
                              className="rounded-circle"
                              alt="order"
                              width={30}
                              height={30}
                            />
                          </div>
                          <div className="flex-grow-1 ms-2">
                            <Link
                              href={menu.viewLink}
                              className="fs-14 fw-semibold mb-0 text-secondary"
                            >
                              {menu.item}
                            </Link>
                          </div>
                        </div>
                      </td>

                      <td className="fs-12 fw-semibold text-body">
                        ${menu.price}
                      </td>

                      <td className="fs-12 fw-semibold text-body">
                        {menu.ingredients}
                      </td>

                      <td className="text-end">
                        <div className="d-flex justify-content-end align-items-center gap-1">
                          <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                            <i className="material-symbols-outlined fs-16 text-primary">
                              visibility
                            </i>
                          </button>
                          <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                            <i className="material-symbols-outlined fs-16 text-primary-div-50">
                              edit
                            </i>
                          </button>
                          <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                            <i className="material-symbols-outlined fs-16 text-danger">
                              delete
                            </i>
                          </button>
                        </div>
                      </td>
                    </tr>
                  ))}
                </tbody>
              </Table>
            </div>

            <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap mt-4">
              <span className="fs-12 fw-medium">
                Showing {indexOfFirstItem + 1} to{" "}
                {Math.min(indexOfLastItem, filteredMenus.length)} of{" "}
                {filteredMenus.length} Results
              </span>

              <nav aria-label="Page navigation example">
                <ul className="pagination mb-0 justify-content-center">
                  <li className="page-item">
                    <button
                      onClick={handlePrevious}
                      className="page-link icon hover-bg"
                      disabled={currentPage === 1}
                    >
                      <i className="material-symbols-outlined">
                        keyboard_arrow_left
                      </i>
                    </button>
                  </li>
                  {Array.from({ length: totalPages }, (_, i) => i + 1).map(
                    (page) => (
                      <li key={page} className="page-item">
                        <button
                          onClick={() => handlePageChange(page)}
                          className={`page-link ${
                            currentPage === page ? "active" : ""
                          }`}
                        >
                          {page}
                        </button>
                      </li>
                    )
                  )}
                  <li className="page-item">
                    <button
                      onClick={handleNext}
                      className="page-link icon hover-bg"
                      disabled={currentPage === totalPages}
                    >
                      <i className="material-symbols-outlined">
                        keyboard_arrow_right
                      </i>
                    </button>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </Card.Body>
      </Card>

      {/* Modal */}
      <div className={`custom-modal center ${isShowModal ? "" : "show"}`}>
        <div className="custom-modal-content position-relative z-3">
          <div className="border-bottom py-3 px-4 d-flex align-items-center justify-content-between">
            <h3 className="fs-18 mb-0">Add New Dish</h3>

            <div className="close-link" onClick={handleToggleShowModal}>
              <span className="material-symbols-outlined">close</span>
            </div>
          </div>

          <div className="p-4">
            <Form>
              <Row>
                <Col md={4}>
                  <Form.Group className="mb-4">
                    <Form.Label className="label">Dish Code</Form.Label>
                    <Form.Control
                      type="text"
                      className="text-dark"
                      placeholder="E.g #3215"
                    />
                  </Form.Group>
                </Col>

                <Col md={4}>
                  <Form.Group className="mb-4">
                    <Form.Label className="label">Name</Form.Label>
                    <Form.Control
                      type="text"
                      className="text-dark"
                      placeholder="E.g Parsley Chicken"
                    />
                  </Form.Group>
                </Col>

                <Col md={4}>
                  <Form.Group className="mb-4">
                    <Form.Label className="label">Price</Form.Label>
                    <Form.Control
                      type="text"
                      className="text-dark"
                      placeholder="E.g $12.50"
                    />
                  </Form.Group>
                </Col>

                <Col md={4}>
                  <Form.Group className="mb-4">
                    <Form.Label className="label">Calorie</Form.Label>
                    <Form.Control
                      type="text"
                      className="text-dark"
                      placeholder="E.g 3215 Kcal"
                    />
                  </Form.Group>
                </Col>

                <Col md={4}>
                  <Form.Group className="mb-4">
                    <Form.Label className="label">Carbs</Form.Label>
                    <Form.Control
                      type="text"
                      className="text-dark"
                      placeholder="E.g 525 gm"
                    />
                  </Form.Group>
                </Col>

                <Col md={4}>
                  <Form.Group className="mb-4">
                    <Form.Label className="label">Protein</Form.Label>
                    <Form.Control
                      type="text"
                      className="text-dark"
                      placeholder="E.g 125 gm"
                    />
                  </Form.Group>
                </Col>

                <Col md={6}>
                  <Form.Group className="mb-4">
                    <Form.Label className="label">Fibres</Form.Label>
                    <Form.Control
                      type="text"
                      className="text-dark"
                      placeholder="E.g 15 gm"
                    />
                  </Form.Group>
                </Col>

                <Col md={6}>
                  <Form.Group className="mb-4">
                    <Form.Label className="label">Fat</Form.Label>
                    <Form.Control
                      type="text"
                      className="text-dark"
                      placeholder="E.g 25 gm"
                    />
                  </Form.Group>
                </Col>

                <Col md={12}>
                  <Form.Group className="mb-4">
                    <Form.Label className="label">Vitamins</Form.Label>
                    <Form.Control
                      type="text"
                      className="text-dark"
                      placeholder="E.g 13 gm"
                    />
                  </Form.Group>
                </Col>

                <Col md={6}>
                  <Form.Group className="mb-4">
                    <Form.Label className="label">Sugar</Form.Label>
                    <Form.Control
                      type="text"
                      className="text-dark"
                      placeholder="E.g 214 gm"
                    />
                  </Form.Group>
                </Col>

                <Col md={6}>
                  <Form.Group className="mb-4">
                    <Form.Label className="label">Minerals</Form.Label>
                    <Form.Control
                      type="text"
                      className="text-dark"
                      placeholder="E.g 5 gm"
                    />
                  </Form.Group>
                </Col>

                <Col md={6}>
                  <Form.Group className="mb-4">
                    <Form.Label className="label">
                      Ingredients Details
                    </Form.Label>
                    <Form.Control
                      type="text"
                      className="text-dark"
                      placeholder="E.g 5 Parsely, chicken, mozzarella, buffalo sauce"
                    />
                  </Form.Group>
                </Col>

                <Col md={6}>
                  <Form.Group className="mb-4">
                    <Form.Label className="label">Order In Queue</Form.Label>
                    <Form.Control
                      type="text"
                      className="text-dark"
                      placeholder="E.g 5 17"
                    />
                  </Form.Group>
                </Col>

                <Col md={12}>
                  <Form.Group className="mb-4">
                    <Form.Label className="label">
                      Upload Item Images
                    </Form.Label>
                    <Form.Control
                      type="file"
                      className="text-dark"
                      placeholder="E.g 5 17"
                    />
                  </Form.Group>
                </Col>
              </Row>

              <Form.Group className="d-flex justify-content-end gap-3">
                <Button
                  variant="danger"
                  type="submit"
                  className="text-white fw-semibold py-2 px-4"
                  onClick={handleToggleShowModal}
                >
                  Cancel
                </Button>

                <Button
                  variant="primary"
                  type="submit"
                  className="text-white fw-semibold py-2 px-2 px-sm-3"
                >
                  <span className="py-sm-1 d-block">
                    <i className="ri-add-line text-white"></i>{" "}
                    <span>Add Dish</span>
                  </span>
                </Button>
              </Form.Group>
            </Form>
          </div>
        </div>

        <div className="close-outside" onClick={handleToggleShowModal}></div>
      </div>
    </>
  );
};

export default MenusTable;
