import CustomerRatings from "@/components/Dashboard/Restaurant/CustomerRatings";
import Expense from "@/components/Dashboard/Restaurant/Expense";
import LowStockAlerts from "@/components/Dashboard/Restaurant/LowStockAlerts";
import OrderSummary from "@/components/Dashboard/Restaurant/OrderSummary";
import PendingOrders from "@/components/Dashboard/Restaurant/PendingOrders";
import RecentOrdersList from "@/components/Dashboard/Restaurant/RecentOrdersList";
import Revenue from "@/components/Dashboard/Restaurant/Revenue";
import RevenueByBranches from "@/components/Dashboard/Restaurant/RevenueByBranches";
import RevenueVSExpense from "@/components/Dashboard/Restaurant/RevenueVSExpense";
import StaffPerformanceScores from "@/components/Dashboard/Restaurant/StaffPerformanceScores";
import Tickets from "@/components/Dashboard/Restaurant/Tickets";
import TopSellingItems from "@/components/Dashboard/Restaurant/TopSellingItems";
import Order from "@/components/Dashboard/Restaurant/TotalOrders";
import Welcome from "@/components/Dashboard/Restaurant/Welcome";
import { Row, Col } from "react-bootstrap";

export default function Page() {
  return (
    <>
      <Row className="justify-content-center">
        <Col xxl={6}>
          <Welcome />

          <Row>
            <Col sm={6}>
              <Order />
            </Col>
            <Col sm={6}>
              <PendingOrders />
            </Col>
          </Row>
        </Col>

        <Col xxl={6}>
          <Row>
            <Col sm={6}>
              <Revenue />
            </Col>
            <Col sm={6}>
              <Expense />
            </Col>
          </Row>

          <TopSellingItems />
        </Col>

        <Col lg={12}>
          <RecentOrdersList />
        </Col>

        <Col xxl={3}>
          <OrderSummary />
        </Col>

        <Col lg={6} xxl={6}>
          <RevenueVSExpense />
        </Col>

        <Col xxl={3} lg={6}>
          <LowStockAlerts />
        </Col>

        <Col lg={6} md={6} xl={6} xxl={4}>
          <StaffPerformanceScores />
        </Col>

        <Col lg={6} md={6} xl={6} xxl={4}>
          <RevenueByBranches />
        </Col>

        <Col lg={6} md={6} xl={6} xxl={4}>
          <Tickets />
        </Col>

        <Col lg={12}>
          <CustomerRatings />
        </Col>
      </Row>
    </>
  );
}
