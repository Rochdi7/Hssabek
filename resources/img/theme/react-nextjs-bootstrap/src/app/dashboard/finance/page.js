import TotalIncome from "@/components/Dashboard/Finance/TotalIncome";
import AccountPayable from "@/components/Dashboard/Finance/AccountPayable";
import AccountsReceivable from "@/components/Dashboard/Finance/AccountsReceivable";
import TotalExpenses from "@/components/Dashboard/Finance/TotalExpenses";
import { Row, Col } from "react-bootstrap";
import Static from "@/components/Dashboard/Finance/Static";
import WeeklyExpenses from "@/components/Dashboard/Finance/WeeklyExpenses";
import NetProfit from "@/components/Dashboard/Finance/NetProfit";
import TransactionHistory from "@/components/Dashboard/Finance/TransactionHistory";
import DebitCard from "@/components/Dashboard/Finance/DebitCard";
import ExpenseBreakdown from "@/components/Dashboard/Finance/ExpenseBreakdown";
import IncomeSource from "@/components/Dashboard/Finance/IncomeSource";
import CashAtEndOfTheMonth from "@/components/Dashboard/Finance/CashAtEndOfTheMonth";

export default function Page() {
  return (
    <>
      <Row>
        <Col sm={6} xxl={3}>
          <TotalIncome />
        </Col>

        <Col sm={6} xxl={3}>
          <TotalExpenses />
        </Col>

        <Col sm={6} xxl={3}>
          <AccountsReceivable />
        </Col>

        <Col sm={6} xxl={3}>
          <AccountPayable />
        </Col>
      </Row>

      <Row>
        <Col xl={12} xxl={8}>
          <Static />
        </Col>

        <Col xl={12} xxl={4}>
          <CashAtEndOfTheMonth />

          <WeeklyExpenses />
        </Col>
      </Row>

      <Row>
        <Col md={12} lg={12} xl={12} xxl={4}>
          <IncomeSource />

          <NetProfit />
        </Col>

        <Col md={12} lg={12} xl={12} xxl={8}>
          <TransactionHistory />
        </Col>
      </Row>

      <Row>
        <Col md={12} lg={12} xl={12} xxl={8}>
          <DebitCard />
        </Col>

        <Col md={12} lg={12} xl={12} xxl={4}>
          <ExpenseBreakdown />
        </Col>
      </Row>
    </>
  );
}
